<?php

namespace XPAY\Agent\Controllers;
use XPAY\Utils\Crypto;
use XPAY\Utils\Rsa;

ini_set('display_errors', '1');
error_reporting(-1);
set_time_limit(0);
ignore_user_abort(TRUE);

/**
 * Class TestController
 * @package XPAY\Agent\Controllers
 */
class TestController extends ControllerBase {
	public function initialize() {

	}

	public function indexAction(){
		$data = [
			'uid'       =>  1234,
			'tx_no'       =>  '1234',

		];

		var_dump(isset($data['uid'], $data['tx_no']));die;
		echo json_encode($data);die;
	}
}
