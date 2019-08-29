<?php

namespace XPAY\Api\Model;

class TxPayHis extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $tx_no;

    /**
     *
     * @var string
     */
    public $tx_out_no;

    /**
     *
     * @var string
     */
    public $tx_chan_no;

    /**
     *
     * @var integer
     */
    public $acc_id;

    /**
     *
     * @var integer
     */
    public $pay_acc_id;

    /**
     *
     * @var string
     */
    public $bank_code;

    /**
     *
     * @var string
     */
    public $chan_code;

    /**
     *
     * @var integer
     */
    public $prod_id;

    /**
     *
     * @var integer
     */
    public $amt_all;

    /**
     *
     * @var integer
     */
    public $amt_rec;

    /**
     *
     * @var integer
     */
    public $fee_all;

    /**
     *
     * @var integer
     */
    public $fee_rate;

    /**
     *
     * @var integer
     */
    public $fee_cost;

    /**
     *
     * @var integer
     */
    public $fee_platform;

    /**
     *
     * @var integer
     */
    public $fee_s;

    /**
     *
     * @var integer
     */
    public $fee_ss;

    /**
     *
     * @var integer
     */
    public $fee_sss;

    /**
     *
     * @var integer
     */
    public $ctime;

    /**
     *
     * @var integer
     */
    public $mtime;

    /**
     *
     * @var integer
     */
    public $etime;

    /**
     *
     * @var integer
     */
    public $settle_state;

    /**
     *
     * @var integer
     */
    public $settle_cycle;

    /**
     *
     * @var integer
     */
    public $settle_time;

    /**
     *
     * @var integer
     */
    public $state;

    /**
     *
     * @var string
     */
    public $return_url;

    /**
     *
     * @var string
     */
    public $notify_url;

    /**
     *
     * @var integer
     */
    public $notify_time;

    /**
     *
     * @var integer
     */
    public $notify_state;

    /**
     *
     * @var integer
     */
    public $notify_count;

    /**
     *
     * @var integer
     */
    public $frozen_state;

    /**
     *
     * @var integer
     */
    public $frozen_time;

    /**
     *
     * @var string
     */
    public $memo;

    /**
     *
     * @var string
     */
    public $ip_addr;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("tx_pay_his");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tx_pay_his';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TxPayHis[]|TxPayHis|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TxPayHis|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
