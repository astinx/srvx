<?php

namespace XPAY\Home\Controllers;

/**
 * 系统
 * Class SysController
 * @package XPAY\Home\Controllers
 */
class SysController extends ControllerBase {
	//-------------------------------------------------------------------------------------------------------------------------
	public function initialize() {
		parent::initialize();
	}

	//系统基础设置
	public function indexAction() {
		echo time();
	}

	//邮件设置
	public function emailAction(){

	}

	//短信设置
	public function smsAction(){

	}

	//定时任务
	public function taskAction(){

	}

	//清除缓存
	public function cacheAction(){

	}

	//保证金设置
	public function guarantyAction(){

	}
}