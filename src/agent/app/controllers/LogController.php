<?php

namespace SRVX\Agent\Controllers;

use SRVX\Msg;
use SRVX\Base;

/**
 * 用戶
 * Class WalletController
 * @package SRVX\Agent\Controllers
 */
class LogController extends ControllerBase {
	public function initialize() {
		parent::initialize();
	}

	//TODO 最近一个月登录记录数量
	public function monthLogNumAction() {
		return $this->api($this->s->log()->loginRecordNum($this->uid, time() - 2592000));
	}

	//TODO 最近一个月登录
	public function monthLogAction(int $page) {
		return $this->api($this->s->log()->loginRecord($this->uid, time() - 2592000, 'ctime,ip_addr', (int)$page));
	}

	//TODO 资金记录类型
	public function moneyRecordTypeAction() {
		return $this->api(Base::fundRecordType);
	}

	//TODO 资金记录数量
	public function moneyRecordNumAction() {
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		$stime = isset($rawData->ctime) ? !($rawData->ctime === '') ? (int)$rawData->ctime : 0 : 0;
		$etime = isset($rawData->etime) ? !($rawData->etime === '') ? (int)$rawData->etime : 0 : 0;
		$type  = isset($rawData->bal_type) ? !($rawData->bal_type === '') ? (int)$rawData->bal_type : '' : '';
		return $this->api($this->s->log()->moneyRecordNum($this->uid, $stime, $etime, $type));
	}

	//TODO 资金记录
	public function moneyRecordAction() {
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		$record['uid']     = $this->uid;
		$record['txId']    = isset($rawData->tx_id) ? !($rawData->tx_id === '') ? (int)$rawData->tx_id : 0 : 0;
		$record['ctime']   = isset($rawData->ctime) ? !($rawData->ctime === '') ? (int)$rawData->ctime : 0 : 0;
		$record['etime']   = isset($rawData->etime) ? !($rawData->etime === '') ? (int)$rawData->etime : 0 : 0;
		$record['balType'] = isset($rawData->bal_type) ? !($rawData->bal_type === '') ? (int)$rawData->bal_type : '' : '';
		$record['page']    = isset($rawData->page) ? !($rawData->page === '') ? (int)$rawData->page : 1 : 1;
		$record            = $this->s->log()->moneyRecord($record);
		if ($record) {
			foreach ($record as $k => $v) {
				$record[$k]['username'] = $this->userInfo['username'];
				$record[$k]['ctime']    = date("Y-m-d H:i:s", $v['ctime']);
				$record[$k]['bal_type'] = Base::fundRecordType[$v['bal_type']];
			}
		}
		return $this->api($record);
	}
	//---------------------------------------------------------结算----------------------------------------------------------
	//结算记录数量
	public function settleLogQuantityAction() {
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		$settle['uid']         = $this->uid;
		$settle['stime']       = isset($rawData->ctime) ? !($rawData->ctime === '') ? (int)$rawData->ctime : 0 : 0;
		$settle['etime']       = isset($rawData->etime) ? !($rawData->etime === '') ? (int)$rawData->etime : 0 : 0;
		$settle['settleState'] = isset($rawData->settle_state) ? !($rawData->settle_state === '') ? (int)$rawData->settle_state : '' : '';
		$settle['settleCycle'] = isset($rawData->settle_cycle) ? !($rawData->settle_cycle === '') ? (int)$rawData->settle_cycle : '' : '';
		return $this->api($this->s->log()->settleLogListQuantity($settle));
	}

	//结算金额
	public function settlementAmountAction() {
		$sum['suc']     = $this->s->balance()->settlementAmount($this->uid, 1);
		$sum['failure'] = $this->s->balance()->settlementAmount($this->uid, 2);
		return $this->api($sum);
	}

	//结算次数
	public function settlementCountAction() {
		$count['suc']     = $this->s->balance()->settlementCount($this->uid, 1);
		$count['failure'] = $this->s->balance()->settlementCount($this->uid, 2);
		return $this->api($count);
	}

	//结算记录
	public function settleLogAction() {
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		$settle['uid']         = $this->uid;
		$settle['stime']       = isset($rawData->ctime) ? !($rawData->ctime === '') ? (int)$rawData->ctime : 0 : 0;
		$settle['etime']       = isset($rawData->etime) ? !($rawData->etime === '') ? (int)$rawData->etime : 0 : 0;
		$settle['page']        = isset($rawData->page) ? !($rawData->page === '') ? (int)$rawData->page : 1 : 1;
		$settle['settleState'] = isset($rawData->settle_state) ? !($rawData->settle_state === '') ? (int)$rawData->settle_state : '' : '';
		$settle['settleCycle'] = isset($rawData->settle_cycle) ? !($rawData->settle_cycle === '') ? (int)$rawData->settle_cycle : '' : '';
		$list                  = $this->s->log()->settleLogList($settle);
		if ($list) {
			foreach ($list as $k => $v) {
				$list[$k]['prod_id']      = Base::ChanProdName[$v['prod_id']];
				$list[$k]['settle_state'] = Base::SettleState[$v['settle_state']];
				$list[$k]['settle_cycle'] = Base::SettleCycle[$v['settle_cycle']];
				$list[$k]['settle_time']  = $v['settle_time'] > 0 ? date("Y-m-d H", $v['settle_time']) : 0;
			}
		}
		return $this->api($list);
	}
	//------------------------------------------------------------代付-------------------------------------------------
	//代付记录数量
	public function remitLogQuantityAction() {
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		$remit['uid']         = $this->uid;
		$remit['stime']       = isset($rawData->ctime) ? !($rawData->ctime === '') ? (int)$rawData->ctime : 0 : 0;
		$remit['etime']       = isset($rawData->etime) ? !($rawData->etime === '') ? (int)$rawData->etime : 0 : 0;
		$remit['state'] = isset($rawData->state) ? !($rawData->state === '') ? (int)$rawData->state : '' : '';
		return $this->api($this->s->log()->remitLogListQuantity($remit));
	}
	//代付金额
	public function remitAmountAction() {
		$sum['suc']     = $this->s->balance()->remitAmount($this->uid, 1);
		$sum['failure'] = $this->s->balance()->remitAmount($this->uid, 2);
		return $this->api($sum);
	}
	//代付次数
	public function remitCountAction() {
		$count['suc']     = $this->s->balance()->remitCount($this->uid, 1);
		$count['failure'] = $this->s->balance()->remitCount($this->uid, 2);
		return $this->api($count);
	}
	//代付记录
	public function remitLogAction() {
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		$remit['uid']         = $this->uid;
		$remit['stime']       = isset($rawData->ctime) ? !($rawData->ctime === '') ? (int)$rawData->ctime : 0 : 0;
		$remit['etime']       = isset($rawData->etime) ? !($rawData->etime === '') ? (int)$rawData->etime : 0 : 0;
		$remit['page']        = isset($rawData->page) ? !($rawData->page === '') ? (int)$rawData->page : 1 : 1;
		$remit['state'] = isset($rawData->state) ? !($rawData->state === '') ? (int)$rawData->state : '' : '';
		$list                  = $this->s->log()->remitLogList($remit);
		if ($list) {
			foreach ($list as $k => $v) {
				$list[$k]['state'] = Base::OrderRemitState[$v['state']];
				$list[$k]['ctime']  = $v['ctime'] > 0 ? date("Y-m-d H", $v['ctime']) : 0;
			}
		}
		return $this->api($list);
	}
}