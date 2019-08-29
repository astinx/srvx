<?php

namespace XPAY\Api\Controllers;

use XPAY\Api\Common\Msg;
use XPAY\Api\Lib\Pay;
use XPAY\Utils\QRcode;

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