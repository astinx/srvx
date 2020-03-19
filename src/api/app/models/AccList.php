<?php

namespace SRVX\Api\Model;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class AccList extends BaseModel
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
    public $parent_acc_id;

    /**
     *
     * @var integer
     */
    public $role_id;

    /**
     *
     * @var integer
     */
    public $acc_type;

    /**
     *
     * @var string
     */
    public $acc_name;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $phone;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $salt;

    /**
     *
     * @var integer
     */
    public $ctime;

    /**
     *
     * @var integer
     */
    public $s_acc_id;

    /**
     *
     * @var integer
     */
    public $ss_acc_id;

    /**
     *
     * @var integer
     */
    public $sss_acc_id;

    /**
     *
     * @var integer
     */
    public $state;

    /**
     *
     * @var double
     */
    public $settle_rate;

    /**
     *
     * @var integer
     */
    public $settle_cycle;

    /**
     *
     * @var integer
     */
    public $adm_id;

    /**
     *
     * @var string
     */
    public $memo;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("acc_list");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'acc_list';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccList[]|AccList|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccList|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
