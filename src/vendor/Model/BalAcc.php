<?php

namespace SRVX\Model;

class BalAcc extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $acc_id;

    /**
     *
     * @var string
     */
    public $currency_code;

    /**
     *
     * @var integer
     */
    public $amount;

    /**
     *
     * @var integer
     */
    public $frozen;

    /**
     *
     * @var integer
     */
    public $fixed;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("bal_acc");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'bal_acc';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return BalAcc[]|BalAcc|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return BalAcc|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
