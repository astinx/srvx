<?php

namespace SRVX\Api\Model;

class TxRemitHis extends BaseModel
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
    public $chan_code;

    /**
     *
     * @var integer
     */
    public $remit_type;

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
     * @var string
     */
    public $bank_code;

    /**
     *
     * @var string
     */
    public $real_name;

    /**
     *
     * @var string
     */
    public $bank_province;

    /**
     *
     * @var string
     */
    public $bank_city;

    /**
     *
     * @var string
     */
    public $bank_branch;

    /**
     *
     * @var integer
     */
    public $ctime;

    /**
     *
     * @var integer
     */
    public $etime;

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
    public $operator;

    /**
     *
     * @var string
     */
    public $memo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("tx_remit_his");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tx_remit_his';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TxRemitHis[]|TxRemitHis|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TxRemitHis|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
