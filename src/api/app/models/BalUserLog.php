<?php

namespace SRVX\Api\Model;

class BalUserLog extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $bal_log_id;

    /**
     *
     * @var integer
     */
    public $acc_id;

    /**
     *
     * @var integer
     */
    public $amt;

    /**
     *
     * @var integer
     */
    public $bal_type;

    /**
     *
     * @var string
     */
    public $tx_no;

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
     *
     * @var integer
     */
    public $fee;

    /**
     *
     * @var integer
     */
    public $ctime;

    /**
     *
     * @var string
     */
    public $currency_code;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("bal_user_log");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'bal_user_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return BalUserLog[]|BalUserLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return BalUserLog|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
