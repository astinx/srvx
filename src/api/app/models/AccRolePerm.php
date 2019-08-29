<?php

namespace XPAY\Api\Model;

class AccRolePerm extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $perm_id;

    /**
     *
     * @var integer
     */
    public $parent_pid;

    /**
     *
     * @var string
     */
    public $icon;

    /**
     *
     * @var string
     */
    public $perm_path;

    /**
     *
     * @var string
     */
    public $name;

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
        $this->setSource("acc_role_perm");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'acc_role_perm';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccRolePerm[]|AccRolePerm|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccRolePerm|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
