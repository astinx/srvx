<?php

namespace XPAY;

use XPAY\Service\TxService;

/**
 * Class Services
 * @package XPAY\Service
 */
class Service {
	/**
	 * @return \XPAY\Service\AdminService()
	 */
	public function admin() {
		return new Service\AdminService();
	}

	/**
	 * @return Service\AuthService
	 */
	public function auth(){
		return new Service\AuthService();
	}

	/**
	 * 添加如下语句就可以在IDE显示提示
	 * @return \XPAY\Service\UserService()
	 */
	public function user() {
		return new Service\UserService();
	}

	public function adminLog() {
		return new Service\AdminLogService();
	}

	public function userLog() {
		return new Service\UserLogService();
	}

	/**
	 * @property \XPAY\Service\BankService()
	 * @return Service\BankService
	 */
	public function bank() {
		return new Service\BankService();
	}

	/**
	 * @property \XPAY\Service\CaptchaService()
	 * @return Service\CaptchaService()
	 */
	public function captcha() {
		return new Service\CaptchaService();
	}

	/**
	 * @property \XPAY\Service\MailService()
	 * @return Service\MailService
	 */
	public function mail() {
		return new Service\MailService();
	}

	/**
	 * @property \XPAY\Service\SmsService()
	 * @return Service\SmsService
	 */
	public function sms() {
		return new Service\SmsService();
	}

	/**
	 * @property \XPAY\Service\UserSignService()
	 * @return Service\UserSignService
	 */
	public function sign() {
		return new Service\UserSignService();
	}

	/**
	 * @property \XPAY\Service\LogService()
	 * @return Service\LogService
	 */
	public function log() {
		return new Service\LogService();
	}

	/**
	 * @property \XPAY\Service\OrderService()
	 * @return Service\OrderService
	 */
	public function order() {
		return new Service\OrderService();
	}

	/**
	 * @return Service\BalanceService
	 */
	public function balance() {
		return new Service\BalanceService();
	}

	/**
	 * @return Service\ChannelService
	 */
	public function channel() {
		return new Service\ChannelService();
	}

	public function tx(){
		return new TxService();
	}
}