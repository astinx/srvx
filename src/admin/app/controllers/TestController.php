<?php

namespace XPAY\Admin\Controllers;

use XPAY\Utils\QRcode;

/**
 * Class OrderController
 * @package XPAY\Admin\Controllers
 */
class TestController extends ControllerBase {
	public function initialize() {
		parent::initialize();
	}

	// 处理中的订单
	public function indexAction() {
		echo  date('YmdHis') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid('', TRUE), 7, 17), 1))), 0, 6);
		die;

	}


	private $viewData;
	public function setVar(string $name, $data){
		$this->viewData[$name] = $data;

	}
	/**
	 * 设置模板, $this->setView('index/index')
	 * @param string $tpl
	 */
	public function setView($tpl = '') {
		$viewPath = __DIR__ . '/../views/';
		foreach ($this->viewData as $k => $v){
			$$k = $v;
		}
		$tpl      = $tpl ? $viewPath . $tpl . '.phtml' : $viewPath . CONTROLLER_NAME . '/' . ACTION_NAME . '.phtml';
		!file_exists($tpl) && die('模板不存在');
		include $tpl;
		die;
	}
}