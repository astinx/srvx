<?php

namespace XPAY\Agent\Controllers;

use XPAY\Msg;

/**
 * 用戶
 * Class AccountController
 * @package XPAY\Agent\Controllers
 */
class AccountController extends ControllerBase {
	public function initialize() {
		parent::initialize();
	}

	//获取用户基础信息,费率等
	public function profilesAction() {
		return $this->api($this->userInfo);
	}

	//修改用户登录密码
	public function pswAction() {
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		$info['uid']    = $this->uid;
		$info['phone']  = isset($rawData->phone) ? !($rawData->phone === '') ? (int)$rawData->phone : 0 : 0;
		$info['email']  = isset($rawData->email) ? !($rawData->email === '') ? (int)$rawData->email : 0 : 0;
		$info['acDesc'] = isset($rawData->action_desc) ? !($rawData->action_desc === '') ? addslashes($rawData->action_desc) : '' : '';
		$info['ip']     = isset($rawData->ip) ? !($rawData->ip === '') ? (int)$rawData->ip : 0 : 0;
		!$info['phone'] && !$info['email'] && !$info['acDesc'] && !$this->api(Msg::Suc);
		return $this->api($this->s->user()->editUserInfo($info));
	}

	//-----------------------------------------仅限代理商-----------------------------------------
	//修改邮箱密码
	public function mailAction() {
		$this->userInfo['userType'] != 1 && $this->api(Msg::ErrPermissionDenied);
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		!isset($rawData->password) && !isset($rawData->new_pass) && $this->api(Msg::ErrParameterCannotBeNull);
		$with['uid']      = $this->uid;
		$with['otp']      = (string)$rawData->otp;
		$with['password'] = $rawData->password;
		$with['newPass']  = $rawData->new_pass;
		$with['ip']       = isset($rawData->ip) ? !($rawData->ip === '') ? (int)$rawData->ip : 0 : 0;
		!$with['password'] && !$with['newPass'] && $this->api(Msg::ErrPassword);
		return $this->api($this->s->user()->withdrawalPassword($with));
	}
}