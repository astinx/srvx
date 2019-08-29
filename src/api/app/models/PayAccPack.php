<?php

namespace XPAY\Api\Model;

class PayAccPack extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $pack_id;

    /**
     *
     * @var string
     */
    public $pack_name;

    /**
     *
     * @var integer
     */
    public $prod_id;

    /**
     *
     * @var string
     */
    public $pay_acc_ids;

    /**
     *
     * @var integer
     */
    public $ctime;

    /**
     *
     * @var integer
     */
    public $state;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("pay_acc_pack");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pay_acc_pack';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayAccPack[]|PayAccPack|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayAccPack|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
