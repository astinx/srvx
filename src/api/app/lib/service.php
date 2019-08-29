<?php

namespace XPAY\Api\Lib;

/**
 * Class Service
 * @package XPAY\Api
 */
class Service {
	/**
	 * @return \XPAY\Api\Lib\Service\AccountService();
	 */
	public function account() {
		return new \XPAY\Api\Lib\Service\AccountService();
	}

	/**
	 * @return Service\BalanceService
	 */
	public function balance() {
		return new \XPAY\Api\Lib\Service\BalanceService();
	}

	/**
	 * @return Service\TxService
	 */
	public function tx() {
		return new \XPAY\Api\Lib\Service\TxService();
	}

	/**
	 * @return \XPAY\Api\Lib\Service\SysService();
	 */
	public function sys() {
		return new \XPAY\Api\Lib\Service\SysService();
	}
}