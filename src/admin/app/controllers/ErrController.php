<?php
/**
 *
 */

namespace XPAY\Admin\Controllers;

use XPAY\Msg;

class ErrController extends ControllerBase {
	public function initialize() {
		parent::initialize();
	}

	//设置今天价格
	public function notFoundAction() {
		$this->api(Msg::ErrNotFound);
	}

	public function methodNotAllowedAction() {
		$this->api(Msg::ErrMethodNotAllowed);
	}

	public function phpinfoAction(int $a = 0) {
		phpinfo();
		die;
	}

	public function aesAction() {
		$this->api(Msg::Suc);
	}

	public function isHolidayAction() {


		$today = date('Ymd');

		$api1 = ('http://tool.bitefu.net/jiari/?d=' . $today);

		$api2 = json_decode(juhecurl('http://www.easybots.cn/api/holiday.php?d=' . $today));


	}

	public function testAction() {

	}


	//每天更新一次
	public function updateHolidaysAction($forceUpdate = false){
		$url = 'http://www.easybots.cn/api/holiday.php?m=201905,201906,201912';
		// 计算本年度剩下的月份
		echo strtotime('201906010');
		// 剩下不到一个月, 计算明年1-6月的
	}

	public function oneAction() {
		$str = '﻿﻿﻿﻿{"code":1001,"info":"","data":[{"id":"3","member_id":"29","product_id":"2","create_time":"1546842418","product_name":"\u6d4b\u8bd59","product_score":"0","product_tag":"1,3,","selled_count":"0","thumbnail":"","product_price":"0.00","tag_name":"\u6e29\u6cc9,\u81ea\u9a7e,"},{"id":"4","member_id":"29","product_id":"26","create_time":"1546842418","product_name":"\u6d4b\u8bd5","product_score":"0","product_tag":"1,3,5,","selled_count":"0","thumbnail":"http:\/\/img.danertu.com\/shuise\/product\/20190305121623621.jpg","product_price":"0.00","tag_name":"\u6e29\u6cc9,\u81ea\u9a7e,\u4e3b\u9898,"}]}';
		//$str='{"code":1001,"info":"","data":[{"id":"3","member_id":"29","product_id":"2","create_time":"1546842418","product_name":"\u6d4b\u8bd59","product_score":"0","product_tag":"1,3,","selled_count":"0","thumbnail":"","product_price":"0.00","tag_name":"\u6e29\u6cc9,\u81ea\u9a7e,"},{"id":"4","member_id":"29","product_id":"26","create_time":"1546842418","product_name":"\u6d4b\u8bd5","product_score":"0","product_tag":"1,3,5,","selled_count":"0","thumbnail":"http:\/\/img.danertu.com\/shuise\/product\/20190305121623621.jpg","product_price":"0.00","tag_name":"\u6e29\u6cc9,\u81ea\u9a7e,\u4e3b\u9898,"}]}';
		echo $str;die;
		$data = json_decode($str,true);
		var_dump($data);exit;
	}

	public function twoAction() {
		echo $_SERVER['HTTP_ORIGIN'];die;
	}
}