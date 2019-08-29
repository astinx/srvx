<?php
/**
 * 登录
 */

namespace XPAY\Admin\Controllers;

use XPAY\Msg;

class SignController extends ControllerBase {
	public function initialize() {
	}

	/**
	 * 登入
	 */
	public function inAction() {
		$username = 'admin';
		$password = '123';
		(!$username || !$password) && $this->api(Msg::ErrAccAuth);
		$res = $this->s->admin()->signIn($username, $password);
		return json_encode(['data' => [$res]], JSON_UNESCAPED_UNICODE);
	}

	public function outAction() {
		$this->session->destroy($this->session->getId());
		return $this->response->redirect('sign/index');
	}

	//获取验证码
	public function getCaptchaAction() {
		$this->s->captcha()->getPic();
	}

	public function getCaptchaBase64Action() {
		echo $this->s->captcha()->getPicBase64();
		die;
	}

	private function checkCaptcha(){
		$captcha = $this->request->getPost('captcha', ['trim', 'lower']);
		!$this->s->captcha()->checkPicCaptcha($captcha) && $this->api(Msg::ErrCaptchaInvalid);
	}
}