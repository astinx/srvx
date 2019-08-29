<?php
namespace XPAY\Admin\Controllers;

class IndexController extends ControllerBase {
	public function initialize() {
		parent::initialize();
	}

	public function indexAction(){
		$this->view->pick('index/index');
	}

	// 欢迎页
	public function welcomeAction(){
		$this->view->pick('index/welcome');
	}
}



