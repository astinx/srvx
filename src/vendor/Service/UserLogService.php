<?php

namespace XPAY\Service;

use XPAY\Base;

use XPAY\Model\McOpLog;
use XPAY\Msg;
use XPAY\Utils\IP;

/**
 * 用户服务(商家与代理统一)
 * Class UserLogService
 * @package XPAY\Service
 */
class UserLogService extends BaseService {
	//-------------------------------------创建记录-------------------------------------
	/**
	 * @param $uid
	 * @return mixed
	 */
	public function createUserSignLog($uid) {
		//登录IP，地址 记录
		$userLog              = new McOpLog();
		$userLog->uid         = $uid;
		$userLog->action_desc = IP::realLocation($this->getIpAddr());
		$userLog->ip_addr     = $this->getIpAddr();
		$userLog->action_type = Base::LogActionTypeSignIn;
		$userLog->ctime       = time();
		return $userLog->create();
	}

	//-------------------------------------获取记录-------------------------------------
	public function getUserSignLog($uid) {

	}




	//-------------------------------------清除记录-------------------------------------
	//删除10条以上登录记录
	public function delOldSignLog() {

	}
}
