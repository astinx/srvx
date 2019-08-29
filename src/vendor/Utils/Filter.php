<?php

namespace XPAY\Utils;

/**
 * 过滤器
 * Class Filter
 * @package XPAY\Utils
 */
class Filter extends \Phalcon\Filter {
	public static function email($mail) {
		return preg_replace('/[^\w\.@-]/', '', $mail);
	}
}