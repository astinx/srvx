<?php

namespace SRVX\Service;

use SRVX\Base;

use SRVX\Model\McOpLog;
use SRVX\Msg;
use SRVX\Utils\IP;

/**
 * 用户服务(商家与代理统一)
 * Class UserLogService
 * @package SRVX\Service
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
