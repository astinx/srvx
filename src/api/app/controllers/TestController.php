<?php

namespace SRVX\Api\Controllers;

use SRVX\Api\Common\Msg;
use SRVX\Api\Lib\Pay;
use SRVX\Utils\QRcode;

class TestController extends ControllerBase {
	//-------------------------------------------------------------------------------------------------------------------------
	//账户余额信息
	public function index() {
		QRcode::png('sdfsdf');
		die;
	}

	// 校验订单号
	public function checkTxNo(string $txNo) {
		return preg_match('/[0-9a-zA-Z]/', $txNo) !== FALSE;
	}
}