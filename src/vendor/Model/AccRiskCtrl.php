<?php

namespace XPAY\Model;

class AccRiskCtrl extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $acc_id;

    /**
     *
     * @var double
     */
    public $min_money;

    /**
     *
     * @var double
     */
    public $max_money;

    /**
     *
     * @var double
     */
    public $unit_all_money;

    /**
     *
     * @var double
     */
    public $all_money;

    /**
     *
     * @var integer
     */
    public $stime;

    /**
     *
     * @var integer
     */
    public $etime;

    /**
     *
     * @var integer
     */
    public $unit_number;

    /**
     *
     * @var integer
     */
    public $is_system;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var integer
     */
    public $ctime;

    /**
     *
     * @var integer
     */
    public $mtime;

    /**
     *
     * @var string
     */
    public $time_unit;

    /**
     *
     * @var integer
     */
    public $unit_interval;

    /**
     *
     * @var string
     */
    public $domain;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("acc_risk_ctrl");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'acc_risk_ctrl';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccRiskCtrl[]|AccRiskCtrl|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccRiskCtrl|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
