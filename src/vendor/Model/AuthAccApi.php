<?php

namespace XPAY\Model;

class AuthAccApi extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $acc_id;

    /**
     *
     * @var integer
     */
    public $sig_type;

    /**
     *
     * @var string
     */
    public $sig;

    /**
     *
     * @var integer
     */
    public $ip_switch;

    /**
     *
     * @var string
     */
    public $ip_binding;

    /**
     *
     * @var integer
     */
    public $ctime;

    /**
     *
     * @var integer
     */
    public $etime;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("auth_acc_api");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'auth_acc_api';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AuthAccApi[]|AuthAccApi|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AuthAccApi|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
