<?php

namespace SRVX\Model;

class AuthAccOtp extends BaseModel
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
    public $secret_key;

    /**
     *
     * @var string
     */
    public $crypto_key;

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
        $this->setSource("auth_acc_otp");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'auth_acc_otp';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AuthAccOtp[]|AuthAccOtp|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AuthAccOtp|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
