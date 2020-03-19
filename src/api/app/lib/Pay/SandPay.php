<?php
namespace SRVX\Api\Lib\Pay;

/**
 * 衫德支付
 * http://sandpay.com
 * 联系人: QQ 2217285771
 * Class YFL
 * @package SRVX\Api\Lib\Pay
 */
class SandPay extends PayBase {
	var $appUrl;  // 链接
	// 网银支付
	public function ebank() {

	}

	// 银联快捷
	public function quick() {

	}

	// h5支付
	public function wap() {
		return FALSE;
	}

	//扫码支付
	public function scan() {
		return FALSE;
	}

	// 订单查询
	public function query($txId) {

	}

	// 余额查询
	public function balance() {
		// TODO: Implement balance() method.
	}

	// 代付
	public function remit() {
		return FALSE;
	}

	// 同步回调通知
	public function syncNotify() {
		return FALSE;
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

	// 进行签名
	public function signing($data, $key) {
		// TODO: Implement signing() method.
	}

	// 进行签名
	public function checkSig($data, $key) {
		// TODO: Implement signing() method.
	}
}