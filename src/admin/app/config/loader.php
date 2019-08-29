<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 * @property \Phalcon\Config $config
 */
$loader->registerDirs([

])->registerNamespaces([
	'XPAY\Admin\Controllers' => $config->application->controllersDir,
	'XPAY'                   => $config->application->vendorDir,
])->register();