<?php

namespace SRVX\Api\Model;

class SysTemplateSms extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $sms_id;

    /**
     *
     * @var string
     */
    public $sms_code;

    /**
     *
     * @var string
     */
    public $sms_title;

    /**
     *
     * @var integer
     */
    public $sms_type;

    /**
     *
     * @var string
     */
    public $sms_content;

    /**
     *
     * @var integer
     */
    public $params_num;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("xpay");
        $this->setSource("sys_template_sms");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'sys_template_sms';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SysTemplateSms[]|SysTemplateSms|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SysTemplateSms|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
