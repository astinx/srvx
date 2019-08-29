<?php

namespace XPAY\Model;

class PayAccQuotaLog extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $term_id;

    /**
     *
     * @var integer
     */
    public $pay_acc_id;

    /**
     *
     * @var integer
     */
    public $quota_type;

    /**
     *
     * @var integer
     */
    public $total;

    /**
     *
     * @var integer
     */
    public $quota;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("pay_acc_quota_log");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pay_acc_quota_log';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayAccQuotaLog[]|PayAccQuotaLog|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayAccQuotaLog|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
