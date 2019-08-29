<?php

namespace XPAY\Agent\Controllers;

use XPAY\Base;
use XPAY\Msg;

/**
 * Class BankController
 * @package XPAY\Agent\Controllers
 */
class BankController extends ControllerBase {
	public function initialize() {
		parent::initialize();
	}

	//TODO 网关名
	public function chanNameAction() {
		return $this->api($this->s->bank()->getChanName());
	}

	//TODO 通道名
	public function chanProdNameAction() {
		return $this->api($this->s->bank()->getChanProdName());
	}

	//TODO 银行列表
	public function bankListAction() {
		return $this->api($this->s->bank()->getBankList());
	}

	//TODO 银行卡操作（仅限代理）
	public function editBankCardAction() {
		$this->userInfo['userType'] != 1 && $this->api(Msg::ErrAuth);
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		!isset($rawData->bank_code) && !isset($rawData->bank_card_attr) && !isset($rawData->bank_card_num) && !isset($rawData->real_name) && $this->api(Msg::ErrParameterCannotBeNull);
		!isset($rawData->bank_province) && !isset($rawData->bank_city) && !isset($rawData->bank_subbranch) && $this->api(Msg::ErrParameterCannotBeNull);
		$bankCode['id']             = isset($rawData->id) ? (int)$rawData->id : 0;
		$bankCode['uid']            = $this->uid;
		$bankCode['bank_code']      = $rawData->bank_code;
		$bankCode['bank_card_attr'] = (int)$rawData->bank_card_attr;
		$bankCode['bank_card_num']  = $rawData->bank_card_num;
		$bankCode['real_name']      = addslashes($rawData->real_name);
		$bankCode['bank_province']  = addslashes($rawData->bank_province);
		$bankCode['bank_city']      = addslashes($rawData->bank_city);
		$bankCode['bank_subbranch'] = addslashes($rawData->bank_subbranch);
		$bankCode['is_default']     = isset($rawData->is_default) ? !($rawData->is_default === '') ? (int)$rawData->is_default : 0 : 0;
		return $this->api($this->s->bank()->operationBankCard($bankCode));
	}

	//TODO 代理商银行卡信息
	public function bankCardInfoAction() {
		$this->userInfo['userType'] != 1 && $this->api(Msg::ErrAuth);
		$bankIn             = $this->s->bank()->getBankCardInfo($this->uid);
		$data['bankList']   = $bankIn ? $bankIn : 0;
		$default            = array_column($bankIn, 'is_default', 'id');
		$data['is_default'] = in_array("1", $default) ? array_search("1", $default) : 0;
		return $this->api($data);
	}

	//TODO 删除银行卡
	public function delBankCardAction(int $id) {
		!$this->request->isDelete() && $this->api(Msg::ErrNotFound);
		$this->userInfo['userType'] != 1 && $this->api(Msg::ErrAuth);
		return $this->api($this->s->bank()->deleteBankCard((int)$id, $this->uid));
	}

	//TODO 默认银行卡结算
	public function defaultBankCardAction(int $id) {
		!$this->request->isDelete() && $this->api(Msg::ErrNotFound);
		$this->userInfo['userType'] != 1 && $this->api(Msg::ErrAuth);
		return $this->api($this->s->bank()->editDefaultBankCard((int)$id, $this->uid));
	}

	//TODO 保证金/余额/冻结
	public function fundsAction() {

	}

	//TODO 保证金/ 冻结资金记录数量
	public function fundsNumAction() {
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		$stime = isset($rawData->ctime) ? !($rawData->ctime === '') ? (int)$rawData->ctime : 0 : 0;
		$etime = isset($rawData->etime) ? !($rawData->etime === '') ? (int)$rawData->etime : 0 : 0;
		$type  = isset($rawData->bal_type) ? !($rawData->bal_type === '') ? (int)$rawData->bal_type : 3 : 3;
		return $this->api($this->s->log()->moneyRecordNum($this->uid, $stime, $etime, $type));
	}

	//TODO 保证金/ 冻结资金记录列表
	public function fundsListAction() {
		$rawData = $this->getRawData();
		!$rawData && $this->api(Msg::ErrFailure);
		$record['uid']      = $this->uid;
		$record['bal_type'] = isset($rawData->bal_type) ? !($rawData->bal_type === '') ? (int)$rawData->bal_type : 3 : 3;
		$record['ctime']    = isset($rawData->ctime) ? !($rawData->ctime === '') ? (int)$rawData->ctime : 0 : 0;
		$record['etime']    = isset($rawData->etime) ? !($rawData->etime === '') ? (int)$rawData->etime : 0 : 0;
		$record['page']     = isset($rawData->page) ? !($rawData->page === '') ? (int)$rawData->page : 1 : 1;
		$list               = $this->s->log()->moneyRecord($record);
		if ($list) {
			foreach ($list as $k => $v) {
				$list[$k]['bal_type'] = Base::fundRecordType[$v['bal_type']];
				$list[$k]['ctime']    = date("Y-m-d H:i:s", $v['ctime']);
			}
		}
		return $this->api($list);
	}

	//通道费率
	public function chanProdRateAction() {
		$list = $this->s->bank()->chanProdRate($this->uid);
		foreach ($list['list'] as $k => $v) {
			$list['name'] ? ($list['list'][$k]['pack_name'] = array_combine(array_column($list['name'], 'pack_id'), $list['name'])[$v['pack_id']]['pack_name']) : '';
		}
		return $list['list'];
	}

	//TODO 通道分析
	public function chanProdAnalyzeAction() {
		$list = $this->s->bank()->chanProdAnalyze(10000);
		$data = array_column($list, 'prod_id');

		var_dump($list);
		die;
	}
}