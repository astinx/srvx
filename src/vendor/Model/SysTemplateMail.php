<?php

namespace XPAY\Model;

class SysTemplateMail extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $mail_id;

    /**
     *
     * @var string
     */
    public $mail_code;

    /**
     *
     * @var string
     */
    public $mail_subject;

    /**
     *
     * @var integer
     */
    public $mail_type;

    /**
     *
     * @var string
     */
    public $mail_body;

    /**
     *
     * @var string
     */
    public $sender;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("sys_template_mail");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'sys_template_mail';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SysTemplateMail[]|SysTemplateMail|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SysTemplateMail|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
