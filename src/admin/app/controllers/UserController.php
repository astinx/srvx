<?php

namespace SRVX\Admin\Controllers;

use SRVX\Msg;

/**
 * 用户管理
 * Class UserController
 * @package SRVX\Admin\Controllers
 */
class UserController extends ControllerBase {
	public function initialize() {
		parent::initialize();
	}

	// ******************************* 商户信息修改 *******************************
	public function merchantListAction() {

	}

	public function merchantEditAction($uid = 0) {
		if ($this->request->isPost()) {
			$this->api($this->s->user()->edit($uid, NULL));
		}
		$uid == 0 && $this->api(Msg::ErrNotFound);
	}

	public function merchantDelAction($uid = 0) {
		($uid == 0 || !$this->request->isPost()) && $this->api(Msg::ErrNotFound);
		$this->api();
	}

	// ******************************* 代理信息修改 *******************************
	public function agentListAction() {
		$this->api();
	}

	public function agentEditAction($uid = 0) {
		$this->api();
	}

	public function agentDelAction($uid = 0) {
		($uid == 0 || !$this->request->isPost()) && $this->api(Msg::ErrNotFound);
	}
}



