<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 * @property \Phalcon\Config $config
 */

$loader->registerNamespaces([
	'SRVX\Api\Common'      => $config->app->commonDir,
	'SRVX\Api\Lib'         => $config->app->libDir,
	'SRVX\Api\Controllers' => $config->app->controllersDir,
	'SRVX\Api\Model'       => $config->app->modelsDir,
	'SRVX\Api\Lib\Pay'         => $config->app->payDir,
])->register();