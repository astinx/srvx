<?php

namespace SRVX\Api\Model;

class AdmRolePerm extends BaseModel
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
    public $name;

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
     * @var integer
     */
    public $is_menu;

    /**
     *
     * @var string
     */
    public $component;

    /**
     *
     * @var string
     */
    public $alias;

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
        $this->setSource("adm_role_perm");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'adm_role_perm';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AdmRolePerm[]|AdmRolePerm|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AdmRolePerm|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
