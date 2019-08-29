<?php

namespace XPAY\Agent\Controllers;

use XPAY\Msg;

/**
 * 用戶
 * Class AccountController
 * @package XPAY\Agent\Controllers
 */
class UserController extends ControllerBase {
	public function initialize() {
		parent::initialize();
	}

	//添加用户
	public function addAction() {
		return $this->api($this->userInfo);
	}
}