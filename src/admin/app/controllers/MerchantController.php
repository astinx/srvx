<?php

namespace SRVX\Admin\Controllers;

use SRVX\Model\UserList;
use SRVX\Msg;

/**
 * 代理管理
 * Class AgentController
 * @package SRVX\Admin\Controllers
 */
class MerchantController extends ControllerBase {
	public function initialize() {
		parent::initialize();
	}

	public function listAction() {
		if ($this->request->isPost()) {
			$this->api(UserList::find(['limit'=> 1])->toArray());
		}
		$this->view->pick('merchant/list');
	}

	// 用户个人资料
	public function editAction($uid = 0) {
		if ($this->request->isPost()) {
			var_dump($this->request->getPost());die;
			$user['uid']      = $this->request->getPost('uid', 'int');
			$user['username'] = $this->request->getPost('username', ['alphanum', 'lower'], '');
			$user['email']    = $this->request->getPost('username', 'email', '');
			$user['phone']    = $this->request->getPost('username', 'int', '');
			$user['qq']       = $this->request->getPost('username', 'int', '');
			$user['password'] = $this->request->getPost('password', 'trim');
			$user['state']    = $this->request->getPost('state', 'int');
			$user['memo']     = $this->request->getPost('state', 'int');
			$this->api();
		}
		if ((int)$uid > 0) {
			// 根据UID获取用户信息
			//$this->view->setVar();
		}
		$this->view->pick('merchant/edit');
	}

	// 费率设置
	public function rateAction($uid = 0) {

	}

	public function detailAction($uid = 0) {

	}

	// 用户统计
	public function statisticAction($uid = 0) {

	}

	//佣金设置
	public function deleteAction() {

	}
}



