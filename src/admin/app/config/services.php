<?php

use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\DI\FactoryDefault;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\File as FileLogger;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Mvc\Dispatcher\Exception as DispatchException;
use Phalcon\Mvc\Model\MetaData\Files as MetaDataFiles;
use Phalcon\Mvc\Model\MetaData\Memory as MetaDataMemory;
use Phalcon\Mvc\View;

//use Phalcon\Session\Adapter\Files as SessionAdapterFiles,
//use Phalcon\Queue\Beanstalk,

//关闭数据库字段非空验证, 否则update和save会报错
Phalcon\Mvc\Model::setup(['notNullValidations' => FALSE]);

//The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
$di = new FactoryDefault();

//inject config
$di->set('config', $config, TRUE);

/**
 * 设置cookies和加密模式
 */
$di->setShared('cookies', function () {
	$cookies = new Phalcon\Http\Response\Cookies();
	$cookies->useEncryption(FALSE); //如果为true则使用下面的crypt加密 , 如果使用加密那速度非常慢
	return $cookies;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () use ($config) {
	$url = new Phalcon\Mvc\Url();
	$url->setBaseUri($config->application->baseUri);
	return $url;
});

//=================================以下为未确认===========================================
/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($config) {
	$view = new View();
	$view->setViewsDir($config->application->viewsDir);
	$view->registerEngines([
		//		'.volt'  => 'voltService',
		'.phtml' => 'Phalcon\Mvc\View\Engine\Php',
	]);
	return $view;
});

/**
 * debug模式记录查询SQL日志
 */
$di->setShared('db', function () use ($config) {
	$db = new DbAdapter([
		'host'       => $config->database->host,
		'username'   => $config->database->username,
		'password'   => $config->database->password,
		'dbname'     => $config->database->dbname,
		'charset'    => $config->database->charset,
		'persistent' => $config->database->persistent, //使用长连接
		'options'    => [
			PDO::ATTR_TIMEOUT => 5,
		],
	]);

	if ($config->debug) {
		$eventsManager = new EventsManager();
		$logger        = new FileLogger(PROJ_DIR . '../debug.log');
		$eventsManager->attach('db', function ($event, $connection) use ($logger) {
			if ($event->getType() == 'beforeQuery') {
				$logger->log($connection->getSQLStatement(), Logger::INFO);
				$logger->log($connection->getRealSQLStatement() . ' ' . json_encode($connection->getSQLVariables()));
				$logger->log($connection->getErrorInfo());
				$logger->log($connection->getDescriptor());
			}
		});
		$db->setEventsManager($eventsManager);
	}

	return $db;
});

/**
 * debug模式不缓存
 */
$di->set('modelsMetadata', function () use ($config) {
	if ($config->debug) {
		return new MetaDataMemory();
	} else {
		return new MetaDataFiles([
			'metaDataDir' => $config->application->metaDataDir,
		]);
	}
});

/**
 * 设置session, debug模式使用File存储，正式使用redis
 */
$di->setShared('session', function () use ($config) {
	$session = new Phalcon\Session\Adapter\Redis([
		'uniqueId'        => $config->session->uniqueId,
		'host'            => $config->redis->host,
		'port'            => $config->redis->port,
		'auth'            => 'foobared', // 密码
		'name'            => $config->session->name,
		'lifetime'        => $config->session->lifetime,
		'persistent'      => FALSE,
		'prefix'          => $config->redis->prefix,
	]);
	session_set_cookie_params(172800, '/', NULL, FALSE, TRUE);
	!$session->isStarted() && $session->start();
	return $session;
});

/**
 * debug模式使用File存储，正式使用redis
 */
$di->setShared('cache', function () use ($config) {
	// 默认15分钟
	$frontCache = new \Phalcon\Cache\Frontend\Data([
		"lifetime" => 900,
	]);

	return new \Phalcon\Cache\Backend\Redis($frontCache, [
		"host"       => $config->redis->host,
		"port"       => $config->redis->port,
		'persistent' => $config->redis->persistent,
		"prefix"     => $config->redis->prefix,
	]);
});

// Redis
$di->setShared('redis', function () use ($config) {
	$redis = new Redis();
	$redis->pconnect($config->redis->host, $config->redis->port, $config->redis->timeout);
	return $redis;
});

/**
 * 服务
 */
$di->setShared('s', function () {
	return new XPAY\Service;
});

/* @var $di Phalcon\DI\FactoryDefault */
$di->setShared('router', function () {
	return include __DIR__ . '/routes.php';
});

$di->setShared('dispatcher', function () {
	//Create an EventsManager
	$eventsManager = new EventsManager();

	//Attach a listener
	$eventsManager->attach("dispatch:beforeException", function ($event, $dispatcher, $exception) {

		//Handle 404 exceptions
		if ($exception instanceof DispatchException) {
			$dispatcher->forward([
				'controller' => 'err',
				'action'     => 'notFound',
				'params'     => ['message' => $exception->getMessage()],
			]);
			return FALSE;
		}

		//Alternative way, controller or action doesn't exist
		/*		if ($event->getType() == 'beforeException') {
					switch ($exception->getCode()) {
						case \Phalcon\Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
						case \Phalcon\Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
							$dispatcher->forward([
								'controller' => 'index',
								'action'     => 'notFound',
								'params'     => ['message' => $exception->getMessage()],
							]);
							return FALSE;
					}
				}*/
	});

	/**
	 * We listen for events in the dispatcher using the Security plugin
	 */ //    $security = new Security($di);
	//    $eventsManager->attach('dispatch', $security);

	$dispatcher = new MvcDispatcher();
	$dispatcher->setDefaultNamespace('\XPAY\Admin\Controllers');

	//Bind the EventsManager to the dispatcher
	$dispatcher->setEventsManager($eventsManager);
	return $dispatcher;
});


