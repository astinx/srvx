<?php

namespace SRVX\Api\Model;

class LogAccOp extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $op_log_id;

    /**
     *
     * @var integer
     */
    public $acc_id;

    /**
     *
     * @var integer
     */
    public $act_type;

    /**
     *
     * @var string
     */
    public $act_desc;

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
        $this->setSource("log_acc_op");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'log_acc_op';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogAccOp[]|LogAccOp|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogAccOp|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
