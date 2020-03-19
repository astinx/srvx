<?php

namespace SRVX\Model;

class PayAcc extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $pay_acc_id;

    /**
     *
     * @var string
     */
    public $acc_name;

    /**
     *
     * @var string
     */
    public $app_acc_id;

    /**
     *
     * @var string
     */
    public $app_id;

    /**
     *
     * @var string
     */
    public $app_key;

    /**
     *
     * @var string
     */
    public $chan_code;

    /**
     *
     * @var integer
     */
    public $settle_cycle;

    /**
     *
     * @var integer
     */
    public $prod_id;

    /**
     *
     * @var integer
     */
    public $sig_type;

    /**
     *
     * @var integer
     */
    public $daily_quota;

    /**
     *
     * @var integer
     */
    public $weekly_quota;

    /**
     *
     * @var integer
     */
    public $monthly_quota;

    /**
     *
     * @var integer
     */
    public $state;

    /**
     *
     * @var integer
     */
    public $rest_quota;

    /**
     *
     * @var integer
     */
    public $quota;

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
     * @var string
     */
    public $rate;

    /**
     *
     * @var integer
     */
    public $minimum;

    /**
     *
     * @var integer
     */
    public $maximum;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("pay_acc");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pay_acc';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayAcc[]|PayAcc|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayAcc|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
