<?php

namespace SRVX\Agent\Controllers;

use SRVX\Base;
use SRVX\Msg;

class TxController extends ControllerBase {
	//-------------------------------------------------------------------------------------------------------------------------
	public function initialize() {
		parent::initialize();
	}
	//-----------------------------------------TODO 处理中-----------------------------------------
	//TODO 处理中订单数量（充值）
	public function payAction() {
		if ($this->request->isPost()) {
			$page        = $this->request->getPost('page', 'int', 0);
			$limit       = $this->request->getQuery('limit', 'int', 25);
			$prodId      = $this->request->getQuery('limit', 'int', ''); //产品类型
			$create_time = $this->request->getPost('time_bucket', 'trim'); //创建时间
			$finish_time = $this->request->getPost('time_bucket', 'trim'); //完成时间
			//var_dump($this->request->getPost());die;

			$etime = $this->request->getQuery('etime', 'int');
			$uid   = (int)$this->uid;
			$state = $this->request->getPost('state', 'int');
			$res   = $this->s->tx()->getUserTxList(1);
			$this->api($res, 100);
		}
		$this->view->pick('tx/merchant_pay');
	}

	//TODO 处理中订单数量（代付）
	public function remitAction() {
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		$data['uid']        = $this->uid;
		$data['txRid']      = isset($rawData->tx_rid) ? !($rawData->tx_rid === '') ? (int)$rawData->tx_rid : 0 : 0;
		$data['startStime'] = isset($rawData->stime) ? !($rawData->stime === '') ? (int)$rawData->stime : 0 : 0;
		$data['startEtime'] = isset($rawData->etime) ? !($rawData->etime === '') ? (int)$rawData->etime : 0 : 0;
		$data['chanCode']   = isset($rawData->chan_code) ? !($rawData->chan_code === '') ? $rawData->chan_code : '' : '';
		$data['state']      = [0];
		return $this->api($this->s->order()->orderQuantityRemit($data));
	}

	//TODO 处理中订单列表（充值）
	public function frozenAction() {
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		$order['uid']    = $this->uid;
		$order['page']   = isset($rawData->page) ? !($rawData->page === '') ? (int)$rawData->page : 1 : 1;
		$order['txOid']  = isset($rawData->tx_oid) ? !($rawData->tx_oid === '') ? (int)$rawData->tx_oid : 0 : 0;
		$order['prodId'] = isset($rawData->prod_id) ? !($rawData->prod_id === '') ? (int)$rawData->prod_id : 0 : 0;
		$order['stime']  = isset($rawData->stime) ? !($rawData->stime === '') ? (int)$rawData->stime : 0 : 0;
		$order['etime']  = isset($rawData->etime) ? !($rawData->etime === '') ? (int)$rawData->etime : 0 : 0;
		$list            = $this->s->order()->orderProcessing($order);
		if ($list) {
			foreach ($list as $k => $v) {
				$list[$k]['state']        = Base::OrderState[$v['state']];
				$list[$k]['settle_state'] = Base::SettleState[$v['settle_state']];
				$list[$k]['settle_cycle'] = Base::SettleCycle[$v['settle_cycle']];
				$list[$k]['prod_id']      = Base::ChanProdName[$v['prod_id']];
				$list[$k]['ctime']        = $v['ctime'] > 1 ? date('Y-m-d H:i:s', $v['ctime']) : 0;
				$list[$k]['settle_time']  = $v['settle_time'] > 1 ? date('Y-m-d H:i:s', $v['settle_time']) : 0;
				$list[$k]['port']         = '充值';
			}
		}
		return $this->api($list);
	}

	// ******************************** 以下为代理专用 ********************************

	public function payOrderAction() {

	}

	public function remitOrderAction() {
	}

	public function frozenOrderAction() {

	}

	public function refundOrderAction() {

	}
}