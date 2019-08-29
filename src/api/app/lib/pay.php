<?php

namespace XPAY\Api\Lib;

/**
 * TODO 要求所有公有属性方法名都为小写
 * Class Pay
 * @package XPAY\Api
 */
class Pay {
	/**
	 * @return Pay\YiFuLian
	 */
	public function yifulian(){
		return new \XPAY\Api\Lib\Pay\YiFuLian();
	}

	/**
	 * @return Pay\SandPay
	 */
	public function sandpay(){
		return new \XPAY\Api\Lib\Pay\SandPay();
	}

	/**
	 * @return Pay\FuTong
	 */
	public function futong(){
		return new \XPAY\Api\Lib\Pay\FuTong();
	}
}