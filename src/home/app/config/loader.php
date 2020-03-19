<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs([])->registerNamespaces([
	'SRVX\Home\Controllers' => $config->application->controllersDir,
	'XPAY'                  => $config->application->vendorDir
])->register();