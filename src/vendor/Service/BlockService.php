<?php

namespace SRVX\Service;

use SRVX\Template\Mail;
use SRVX\Utils\IP;

/**
 * 封锁服务
 * Class BlockService
 * @package SRVX\Service
 */
class BlockService extends BaseService {
	//Todo 发送注册邮件验证码
	public function signUpCaptcha($mailAddr, $captcha) {
		$body = sprintf(Mail::SignUpCaptchaTemp['body'], $captcha);
		return $this->sendMail($mailAddr, Mail::SignUpCaptchaTemp['subject'], $body);
	}
}