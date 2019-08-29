<?php

namespace XPAY\Model;

class LogAdmOp extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $log_id;

    /**
     *
     * @var integer
     */
    public $adm_id;

    /**
     *
     * @var integer
     */
    public $action_type;

    /**
     *
     * @var string
     */
    public $action_desc;

    /**
     *
     * @var integer
     */
    public $ctime;

    /**
     *
     * @var string
     */
    public $ip_addr;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("log_adm_op");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'log_adm_op';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogAdmOp[]|LogAdmOp|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogAdmOp|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
