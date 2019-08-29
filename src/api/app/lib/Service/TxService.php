<?php

namespace XPAY\Api\Lib\Service;

use XPAY\Api\Model\TxPay;

class TxService extends BaseService {
	public function createPayTx($data) {

		$tx = TxPay::findFirst();

	}

	public function createRemitTx() {

	}

	// 当
	public function checkTxCount($accId) {

	}

	/**
	 * @param int $txType 订单类型
	 * @param int $accId  账户id
	 */
	private function createTxId(int $txType, int $accId) {

	}
}