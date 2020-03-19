<?php

namespace SRVX\Api\Model;

class PayChanProd extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $prod_id;

    /**
     *
     * @var integer
     */
    public $prod_type;

    /**
     *
     * @var string
     */
    public $prod_code;

    /**
     *
     * @var string
     */
    public $prod_name;

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
        $this->setSource("pay_chan_prod");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pay_chan_prod';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayChanProd[]|PayChanProd|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayChanProd|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
