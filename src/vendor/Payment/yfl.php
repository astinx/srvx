<?php

namespace SRVX\Payment;

use SRVX\Utils\Curl;

class YFL {
	private $appId;
	private $appKey;

	public function __construct($appId, $appKey) {
		$this->appId  = $appId;
		$this->appKey = $appKey;
	}

	// 网银
	public function PayEbank() {

	}

	public function PayOrderQuery() {

	}

	public function BalanceQuery() {

	}

	public function Remit() {

	}

	public function RemitOrderQuery() {

	}

}