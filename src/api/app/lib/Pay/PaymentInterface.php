<?php

namespace XPAY\Api\Lib\Pay;

/**
 * 支付接口标准, 所有接口都必须遵循以下接口格式
 * Interface PayInterface
 * @package XPAY\Api\Lib\Pay
 */
interface PaymentInterface {
	public function ebank(array $data, string $key);       		// 网银网关
	public function quick(array $data, string $key);       		// 快捷支付
	public function wap(array $data, string $key);         		// h5支付
	public function scan(array $data, string $key);        		// 扫码支付
	public function remit(array $data, string $key);       		// 代付出款
	public function query(array $data, string $key);       		// 订单查询
	public function balance(array $data, string $key);     		// 余额查询
	public function syncNotify(array $data, string $key);      	// 同步回调通知
	public function asyncNotify(array $data, string $key);     	// 异步回调通知
	public function response(bool $state);                     	// 响应请求
	public function signing(array $data, string $key);         	// 签名
	public function checkSignature(array $data, string $key);  	// 检查签名
}