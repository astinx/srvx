<?php

namespace XPAY\Api\Lib\Service;

class BalanceService extends BaseService {
	public function t() {
		$this->redis->set('sd', 'ddd');
		echo $this->redis->get('sd');
	}
}