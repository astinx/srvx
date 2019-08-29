<?php
header('Access-Control-Allow-Methods:OPTIONS, GET, POST');
header('Access-Control-Allow-Headers:x-requested-with');
header('Access-Control-Max-Age:86400');
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods:GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
header('Access-Control-Allow-Headers:Origin, No-Cache, X-Requested-With, If-Modified-Since, Pragma, Last-Modified, Cache-Control, Expires, Content-Type, X-E4M-With');
header('Access-Control-Allow-Headers:*');
header("Content-type: text/html; charset=utf-8");
header("Access-Control-Allow-Origin: " . ($_SERVER['HTTP_ORIGIN'] ?? '*'));

ini_set('display_errors','1');
error_reporting(-1);

try {
	//Read the configuration
	$config = include __DIR__ . '/../app/config/config.php';
	//关闭报错信息, 调试不关闭
	// $config->debug ? error_reporting(-1) : error_reporting(0);
	// Read the auto-loader
	include __DIR__ . '/../app/config/loader.php';
	//Read services
	include __DIR__ . '/../app/config/services.php';
	//Handle the request
	$application = new \Phalcon\Mvc\Application($di);
	echo $application->handle()->getContent();
} catch (\Phalcon\Exception $e) {
	echo $e->getMessage();
} catch (PDOException $e) {
	echo $e->getMessage();
}