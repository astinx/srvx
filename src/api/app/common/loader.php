<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 * @property \Phalcon\Config $config
 */

$loader->registerNamespaces([
	'XPAY\Api\Common'      => $config->app->commonDir,
	'XPAY\Api\Lib'         => $config->app->libDir,
	'XPAY\Api\Controllers' => $config->app->controllersDir,
	'XPAY\Api\Model'       => $config->app->modelsDir,
	'XPAY\Api\Lib\Pay'         => $config->app->payDir,
])->register();