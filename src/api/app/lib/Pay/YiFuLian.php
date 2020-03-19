<?php

namespace SRVX\Api\Lib\Pay;

/**
 * 易付联
 * http://b.epaylinki.com
 * 联系人: QQ
 * Class YFL
 * @package SRVX\Api\Lib\Pay
 */
class YiFuLian extends PayBase {
	// 链接
	var $appUrl;
	// 已经开启的渠道服务
	var $appSvc = ['ebank','quick','wap','scan','remit','query','balance','syncNotify','asyncNotify','response','signing','checkSignature'];
	// 银行对应代码, 与本系统对应的
	var $bankCode = [];

	// 网银支付
	public function ebank(array $data, string $key) {
		$data['payType']     = 'wgpay';
		$data['merchantId']  = $data['app_id'];
		$data['orderNo']     = $data['tx_no'];
		$data['orderAmount'] = $data['amt'];
		$data['pageUrl']     = $data['return_url'];
		$data['notifyUrl']   = $data['notify_url'];
		$data['bankId']      = $this->bankCode[$data['bankCode']];
		$data = $this->sign($data, $key);
	}

	// 银联快捷
	public function quick(array $data, string $key) {
		$data['payType']     = 'kjpay';
		$data['merchantId']  = $data['app_id'];
		$data['orderNo']     = $data['tx_no'];
		$data['orderAmount'] = $data['amt'];
		$data['pageUrl']     = $data['return_url'];
		$data['notifyUrl']   = $data['notify_url'];

		$params = [
			'merchantId'  => $this->appId,
			'pageUrl'     => $this->pageUrl,
			'notifyUrl'   => $this->notifyUrl,
			'orderNo'     => $this->orderNo,
			'orderAmount' => $this->orderAmount,
			'payType'     => 'kjpay' //快捷支付
		];

	}

	// h5支付
	public function wap(array $data, string $key) {

	}

	//扫码支付
	public function scan(array $data, string $key) {

	}

	// 订单查询
	public function query(array $data, string $key) {

	}

	// 余额查询
	public function balance(array $data, string $key) {
		// TODO: Implement balance() method.
	}

	// 代付
	public function remit(array $data, string $key) {
	}

	// 同步回调通知
	public function syncNotify(array $data, string $key) {

	}

	// 异步回调通知
	public function asyncNotify(array $data, string $key) {
		// todo 获取数据并返回
	}

	// 响应请求
	public function response(bool $state) {
		ob_end_clean(); // 清除之前的所有输出
		echo $state ? 'success' : 'failure';
		die;
	}

	// 进行签名
	public function signing(array $data, string $key) {
		// 通用字段
		$data['version']       = '1.0.2';
		$data['signType']      = 'MD5';
		$data['memo']          = '';
		$data['orderDatetime'] = date('YmdHis', TIMESTAMP);
		// 排序
		ksort($data);
		$data['key'] = $key;
		// 签名
		$data['sign'] = md5(urldecode(http_build_query($data)));
		return $data;
	}

	// 检查签名
	public function checkSignature(array $data, string $key) {

		return ;
	}
}