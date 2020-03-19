<?php

namespace SRVX\Utils;

/**
 * 过滤器
 * Class Filter
 * @package SRVX\Utils
 */
class Filter extends \Phalcon\Filter {
	public static function email($mail) {
		return preg_replace('/[^\w\.@-]/', '', $mail);
	}
}