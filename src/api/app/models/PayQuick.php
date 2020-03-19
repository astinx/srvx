<?php

namespace SRVX\Api\Model;

class PayQuick extends BaseModel
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
    public $phone;

    /**
     *
     * @var string
     */
    public $bank_code;

    /**
     *
     * @var integer
     */
    public $bank_card_attr;

    /**
     *
     * @var integer
     */
    public $bank_card_type;

    /**
     *
     * @var string
     */
    public $bank_card_num;

    /**
     *
     * @var integer
     */
    public $id_type;

    /**
     *
     * @var string
     */
    public $id_num;

    /**
     *
     * @var string
     */
    public $id_name;

    /**
     *
     * @var string
     */
    public $bank_card_cvv;

    /**
     *
     * @var integer
     */
    public $bank_card_expire;

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
    public $bank_subbranch;

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
        $this->setSource("pay_quick");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pay_quick';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayQuick[]|PayQuick|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayQuick|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
