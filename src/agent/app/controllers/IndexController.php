<?php

namespace SRVX\Agent\Controllers;

/**
 * 首頁
 * Class IndexController
 * @package XBANK\Home\Controllers
 */
class IndexController extends ControllerBase {

	public function indexAction() {
		$this->isAgent ? $this->view->pick('index/agent_index') : $this->view->pick('index/index');
	}

	public function welcomeAction() {
		$this->isAgent ? $this->view->pick('index/agent_welcome') : $this->view->pick('index/welcome');
	}
}