<?php

namespace XPAY\Api\Model;

class BaseModel extends \Phalcon\Mvc\Model {
	protected function onConstruct() {
		//读写分离,自动选择主从数据库
		// $this->setConnectionService('dbm');
		$this->setWriteConnectionService('db');
		$this->setReadConnectionService('dbs');

		/*
		$metaData = $this->getModelsMetaData();
		foreach ($metaData->getAttributes($this) as $attr) {
			$this->$attr = NULL;
		}
		*/
	}
}
