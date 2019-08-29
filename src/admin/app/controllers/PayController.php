<?php

namespace XPAY\Admin\Controllers;

/**
 * Class OrderController
 * @package XPAY\Admin\Controllers
 */
class PayController extends ControllerBase {
	public function initialize() {
		parent::initialize();
	}

	// 处理中的订单
	public function handleListAction() {
		$page  = $this->request->getQuery('page', 'int');
		$limit = $this->request->getQuery('limit', 'int');

		$this->s->order()->getList();
	}

	public function listCountAction() {

	}

	public function hisListAction($page, $limit) {

	}

	public function getHisListCountAction() {

	}

	// 冻结订单
	public function freezeAction($txId = 0) {

	}

	// 解冻订单
	public function unfreezeAction($txId = 0) {
		//
	}
}