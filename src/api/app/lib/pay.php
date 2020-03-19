<?php

namespace SRVX\Api\Lib;

/**
 * TODO 要求所有公有属性方法名都为小写
 * Class Pay
 * @package SRVX\Api
 */
class Pay {
	/**
	 * @return Pay\YiFuLian
	 */
	public function yifulian(){
		return new \SRVX\Api\Lib\Pay\YiFuLian();
	}

	/**
	 * @return Pay\SandPay
	 */
	public function sandpay(){
		return new \SRVX\Api\Lib\Pay\SandPay();
	}

	/**
	 * @return Pay\FuTong
	 */
	public function futong(){
		return new \SRVX\Api\Lib\Pay\FuTong();
	}
}