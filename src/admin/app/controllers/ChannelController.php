<?php

namespace XPAY\Admin\Controllers;

use XPAY\Base;
use XPAY\Msg;

/**
 * 通道管理
 * Class ChannelController
 * @package XPAY\Admin\Controllers
 */
class ChannelController extends ControllerBase {
	public function initialize() {
		parent::initialize();
	}

	// **************************** 网关 ****************************
	public function chanListAction($state = NULL) {
		$res      = $this->s->channel();
		$chanList = $res->chanList($state);
		$prodList = $res->prodList($state);
		$prodName = array_column($prodList, 'prod_name', 'prod_id');
		foreach ($chanList as $k => $v) {
			$chanList[$k]['prod_name'] = $prodName[$v['prod_id']] ?? '';
		}
		$this->api($chanList);
	}

	public function chanEditAction($chanId = 0) {
		if ($this->request->isPost()) {
			$chanData['chan_code'] = $this->request->getPost('chan_code', ['email', 'upper']);
			$chanData['chan_name'] = addslashes($this->request->getPost('chan_name', 'trim'));
			$chanData['prod_id']   = $this->request->getPost('prod_id', 'int');
			$chanData['state']     = $this->request->getPost('state', 'int');
			$chanData['memo']      = addslashes($this->request->getPost('memo', 'trim'));
			$this->api($this->s->channel()->chanEdit((int)$chanId, $chanData));
		}
		(int)$chanId == 0 && $this->api(Msg::ErrNotFound);
		$res = $this->s->channel()->chanGetById((int)$chanId);
		$this->api($res);
	}

	public function chanDelAction($chanId = 0) {
		(!$this->request->isPost() || (int)$chanId === 0) && $this->api(Msg::ErrNotFound);
		$this->api($this->s->channel()->chanDel((int)$chanId));
	}

	// **************************** 账户通道 ****************************
	public function accListAction($state = NULL) {
		$res      = $this->s->channel();
		$accList  = $res->accList($state);
		$chanList = $res->chanList();
		$chanName = array_column($chanList, 'chan_name', 'chan_code');
		$prodList = $res->prodList();
		$prodName = array_column($prodList, 'prod_name', 'prod_id');
		foreach ($accList as $k => $v) {
			$accList[$k]['chan_name']   = $chanName[$v['chan_code']] ?? '';
			$accList[$k]['prod_name']   = $prodName[$v['prod_id']] ?? '';
			$accList[$k]['settle_name'] = Base::SettleCycle[$v['settle_cycle']];
		}
		$this->api($accList);
	}

	public function accEditAction($accId = 0) {
		if ($this->request->isPost()) {
			$accData['acc_name']      = addslashes($this->request->getPost('acc_name', 'trim'));
			$accData['chan_code']     = $this->request->getPost('chan_code', ['upper', 'trim']);
			$accData['settle_cycle']  = $this->request->getPost('settle_cycle', 'int');
			$accData['prod_id']       = $this->request->getPost('prod_id', 'int');
			$accData['daily_quota']   = $this->request->getPost('daily_quota', 'int');
			$accData['weekly_quota']  = $this->request->getPost('weekly_quota', 'int');
			$accData['monthly_quota'] = $this->request->getPost('monthly_quota', 'int');
			$accData['state']         = $this->request->getPost('state', 'int');
			$accData['rest_quota']    = $this->request->getPost('rest_quota', 'int');
			$accData['quota']         = $this->request->getPost('quota', 'int');
			$accData['balance']       = $this->request->getPost('balance', 'int');
			$accData['frozen']        = $this->request->getPost('frozen', 'int');
			$accData['rate']          = $this->request->getPost('rate', 'float');
			$accData['minimum']       = $this->request->getPost('minimum', 'int');
			$accData['maximum']       = $this->request->getPost('maximum', 'int');
			$this->api($this->s->channel()->accEdit((int)$accId, $accData));
		}
		(int)$accId == 0 && $this->api(Msg::ErrNotFound);
		$res = $this->s->channel()->accGetById((int)$accId);
		$this->api($res);
	}

	public function accDelAction(int $accId = 0) {
		(!$this->request->isPost() || (int)$accId === 0) && $this->api(Msg::ErrNotFound);
		$this->api($this->s->channel()->accDel((int)$accId));
	}

	// **************************** 支付产品 ****************************
	public function prodListAction($state = 0) {
		$this->api($this->s->channel()->prodList($state));
	}

	public function prodEditAction($prodId = 0) {
		!$this->request->isPost() && $this->api(Msg::ErrNotFound);
		$prodData['prod_type'] = $this->request->getPost('prod_type', 'int');
		$prodData['prod_code'] = $this->request->getPost('prod_code', 'trim');
		$prodData['prod_name'] = addslashes($this->request->getPost('prod_name', 'trim'));
		$prodData['state']     = $this->request->getPost('state', 'int');
		$this->api($this->s->channel()->prodEdit((int)$prodId, $prodData));
	}

	public function prodDelAction($prodId = 0) {
		(!$this->request->isPost() || (int)$prodId === 0) && $this->api(Msg::ErrNotFound);
		$this->api($this->s->channel()->prodDel((int)$prodId));
	}

	// **************************** 账户通道组 ****************************

	public function packListAction($state = NULL) {
		$res      = $this->s->channel();
		$packList = $res->packList($state);
		$prodList = $res->prodList($state);
		$prodName = array_column($prodList, 'prod_name', 'prod_id');
		foreach ($packList as $k => $v) {
			$packList[$k]['prod_name'] = $prodName[$v['prod_id']] ?? '';
		}
		$this->api($packList);
	}

	public function packEditAction($packId = 0) {
		if ($this->request->isPost()) {
			$packData['pack_name'] = addslashes($this->request->getPost('pack_name', 'trim'));
			$packData['acc_ids']    = array_filter($this->request->getPost('acc_ids', 'int'));
			$packData['state']     = $this->request->getPost('state', 'int');
			(!$packData['acc_ids'] || !$packData['pack_name']) && $this->api(Msg::ErrInvalidArgument);
			$this->api($this->s->channel()->packEdit((int)$packId, $packData));
		}
		(int)$packId == 0 && $this->api(Msg::ErrNotFound);
		$res = $this->s->channel()->packGetById((int)$packId);
		$this->api($res);
	}

	public function packDelAction($packId = 0) {
		(!$this->request->isPost() || (int)$packId === 0) && $this->api(Msg::ErrNotFound);
		$this->api($this->s->channel()->packDel((int)$packId));
	}
}



