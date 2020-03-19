<?php

namespace SRVX\Model;

class AdmFinanceStatistic extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $term_id;

    /**
     *
     * @var integer
     */
    public $term_type;

    /**
     *
     * @var integer
     */
    public $income;

    /**
     *
     * @var integer
     */
    public $payout;

    /**
     *
     * @var integer
     */
    public $frozen;

    /**
     *
     * @var integer
     */
    public $total;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("adm_finance_statistic");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'adm_finance_statistic';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AdmFinanceStatistic[]|AdmFinanceStatistic|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AdmFinanceStatistic|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
