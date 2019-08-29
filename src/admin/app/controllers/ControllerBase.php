<?php

namespace XPAY\Admin\Controllers;

use Phalcon\Mvc\Controller;
use XPAY\Msg;

/**
 * Class ControllerBase
 * @package XPAY\Admin\Controllers
 * @property \Phalcon\Queue\Beanstalk        $queue
 * @property \Phalcon\Tag                    $tag
 * @property \Phalcon\Cache\BackendInterface $cache
 * @property \Phalcon\Http\Response\Cookies  $cookies
 * @property \Phalcon\Escaper                $escaper
 * @property \XPAY\Service                   $s
 * @property \Redis                          $redis
 */
class ControllerBase extends Controller {
	public $adminInfo;

	//强制初始化执行函数
	protected function onConstruct() {
		if ($this->request->isOptions()) {
			header('HTTP/2.0 204 No Content');
			exit;
		}
		//使用Action基本的渲染
		$this->view->setRenderLevel(1);
		// 如果是post 检查CSRF
		/*if($this->request->isPost()) {
			$this->checkCSRF();
		}*/
	}

	public function beforeExecuteRoute() {

	}

	//初始化参数,如果不继承则不执行
	protected function initialize() {
		//$this->adminInfo= $this->s->admin()->getAuth();
		//!$this->adminInfo&& $this->router->getControllerName() != 'sign' && $this->response->redirect('sign');
		//获取用户信息
		//$this->adminInfo = $this->s->admin()->getAuth();
		//!isset($this->adminInfo['uid']) && $this->router->getControllerName() != 'sign' && $this->api(Msg::ErrAuth);
		//isset($this->adminInfo['uid']) && $this->uid = $this->adminInfo['uid'];
	}

	/**
	 * 重定向
	 * @param $uri
	 */
	public function forward($uri) {
		$uriParts = explode('/', $uri);
		$params   = array_slice($uriParts, 2);
		return $this->dispatcher->forward(['controller' => $uriParts[0], 'action' => $uriParts[1], 'params' => $params,]);
	}

	/**
	 * filter $_GET request
	 * @return array
	 */
	protected function getQuery() {
		$get = $this->request->getQuery();
		unset($get['_url']);
		$data = [];
		foreach ($get as $k => $v) {
			$k        = htmlspecialchars($k);
			$v        = htmlspecialchars($v);
			$data[$k] = $v;
		}
		return $data;
	}

	/**
	 * 生成带参数的url, 包装一层是为了统一生成算法
	 * @param $arr
	 * @return string
	 */
	protected function buildQuery($arr) {
		return http_build_query($arr, '', '&amp;');
	}

	/**
	 * 输出信息并退出程序
	 * @param mixed $data
	 * @param bool  $urlDecodeFlag
	 */
	public function api($data = Msg::Suc, $urlDecodeFlag = FALSE) {
		$this->view->disable();
		$data === TRUE && $data = Msg::Suc;
		!$data && $data = Msg::ErrFailure;
		$res = isset($data['statusCode'], $data['code'], $data['msg']) ? ['code' => $data['code'], 'msg' => $data['msg'], 'data' => []] : ['code' => 0, 'msg' => 'success', 'data' => $data];
		header('Content-type:application/json;charset=utf-8');
		isset($data['statusCode']) && header('HTTP/2.0 ' . $data['statusCode']);
		echo $urlDecodeFlag ? urldecode(json_encode($res)) : json_encode($res);
		die;
	}

	public function getRawData($useArray = FALSE) {
		$res = !$this->request->isPost() && !$this->request->isPut() && $this->request->isPatch() && !$this->request->isDelete() ? $this->api(Msg::ErrNotFound) : json_decode(file_get_contents('php://input'), $useArray);
		return $res ?? $this->api(Msg::ErrInvalidArgument);
	}

	protected function checkIpBanned() {
		$ipAddr = $this->IpBanPreKey . $this->request->getClientAddress();
		$count  = $this->redis->get($ipAddr);
		$count > 3 && $this->api(Msg::ErrUnknown);
	}

	protected function setIpBanned() {
		$ipAddr = $this->IpBanPreKey . $this->request->getClientAddress();
		$count  = $this->redis->get($ipAddr);
		$this->redis->setex($ipAddr, $this->IpBanExpire, ++$count);
	}
}