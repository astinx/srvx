<?php

namespace SRVX\Api\Model;

class AccBankList extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $acc_id;

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
     * @var string
     */
    public $bank_card_num;

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
    public $bank_subbranch;

    /**
     *
     * @var integer
     */
    public $is_default;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("acc_bank_list");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'acc_bank_list';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccBankList[]|AccBankList|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccBankList|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
