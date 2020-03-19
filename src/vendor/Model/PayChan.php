<?php

namespace SRVX\Model;

class PayChan extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $chan_id;

    /**
     *
     * @var string
     */
    public $chan_code;

    /**
     *
     * @var string
     */
    public $chan_name;

    /**
     *
     * @var integer
     */
    public $prod_id;

    /**
     *
     * @var integer
     */
    public $state;

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
        $this->setSource("pay_chan");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pay_chan';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayChan[]|PayChan|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayChan|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
