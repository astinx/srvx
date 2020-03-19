<?php

namespace SRVX\Api\Lib\Pay;

/**
 * 富通支付
 * http://ft-pay.com
 * 联系人: QQ
 * Class ft
 * @package SRVX\Api\Lib\Pay
 */
class FuTong extends PayBase implements PayInterface {
	var $appUrl = '';  // 链接
	var $channel = ['ebank'];
	// 网银支付
	public function ebank() {

	}

	// 银联快捷
	public function quick() {
		return false;
	}

	// h5支付
	public function wap() {
		return false;
	}

	//扫码支付
	public function scan() {
		return false;
	}

	// 代付
	public function remit() {
	}

	// 同步回调通知
	public function syncNotify() {

	}

	// 异步回调通知
	public function asyncNotify() {
		// todo 获取数据并返回
	}

	// 响应请求
	public function response(bool $state) {
		echo $state ? 'success' : 'failure';
		die;
	}
}