<?php

namespace SRVX\Api\Model;

class AdmFinanceLog extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $tx_no;

    /**
     *
     * @var integer
     */
    public $pay_acc_id;

    /**
     *
     * @var integer
     */
    public $gw_id;

    /**
     *
     * @var integer
     */
    public $tx_type;

    /**
     *
     * @var integer
     */
    public $tx_time;

    /**
     *
     * @var integer
     */
    public $before_balance;

    /**
     *
     * @var integer
     */
    public $before_frozen;

    /**
     *
     * @var integer
     */
    public $balance;

    /**
     *
     * @var integer
     */
    public $frozen;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("adm_finance_log");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'adm_finance_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AdmFinanceLog[]|AdmFinanceLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AdmFinanceLog|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
