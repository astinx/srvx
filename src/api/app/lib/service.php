<?php

namespace SRVX\Api\Lib;

/**
 * Class Service
 * @package SRVX\Api
 */
class Service {
	/**
	 * @return \SRVX\Api\Lib\Service\AccountService();
	 */
	public function account() {
		return new \SRVX\Api\Lib\Service\AccountService();
	}

	/**
	 * @return Service\BalanceService
	 */
	public function balance() {
		return new \SRVX\Api\Lib\Service\BalanceService();
	}

	/**
	 * @return Service\TxService
	 */
	public function tx() {
		return new \SRVX\Api\Lib\Service\TxService();
	}

	/**
	 * @return \SRVX\Api\Lib\Service\SysService();
	 */
	public function sys() {
		return new \SRVX\Api\Lib\Service\SysService();
	}
}