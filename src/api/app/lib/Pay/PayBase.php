<?php

namespace SRVX\Api\Lib\Pay;

class PayBase {
	var $appId;  // app名字
	var $appKey; // app签名秘钥
	var $appChan; // 通道

	/**
	 * 请求数据
	 * @param        $url
	 * @param        $params
	 * @param bool   $use_http_build_query
	 * @param bool   $SSL
	 * @param string $ua
	 * @return bool|mixed|string
	 */
	public function curlPost($url, $params, $use_http_build_query = TRUE, $SSL = FALSE, $ua = '') {
		$use_http_build_query && $params = http_build_query($params);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $SSL); // 让CURL支持HTTPS访问
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		// curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; MSIE 11.0; Windows NT 10.0; WOW64; Trident/7.0)'); // 设置USER-AGENT
		$result = curl_exec($ch);
		$link   = curl_getinfo($ch, CURLINFO_REDIRECT_URL); // 获取是否有301或者302的跳转, 如果有直接返回跳转地址
		curl_close($ch);
		return $link ? $link : $result;
	}

	/**
	 * 解析返回的html中的dom元素,并返回数据
	 * @param $text
	 * @return array
	 */
	public function parseHtmlForm($text) {
		$text = stripos($text, 'charset') === FALSE ? '<head><meta charset="utf-8"></head>' . $text : $text;
		$text = stripos($text, '!doctype') === FALSE ? '<!DOCTYPE HTML>' . $text : $text;
		$dom  = new \DOMDocument();
		$dom->loadHTML($text);
		$res        = $data = [];
		$res['url'] = $dom->getElementsByTagName('form')->item(0)->getAttribute('action');
		$tag        = $dom->getElementsByTagName('input');
		foreach ($tag as $k => $v) {
			$data[$tag->item($k)->getAttribute('name')] = $tag->item($k)->getAttribute('value');
		}
		$res['data'] = $data;
		return $res;
	}

	/**
	 * 同页面提交数据到另一页面
	 * @param string $method     提交方法
	 * @param string $link       回调地址
	 * @param array  $submitData 提交的数据
	 * @return string
	 * @throws \Exception
	 */
	public function resubmit($method, $link, array $submitData) {
		$link   = (string)$link;
		$method = strtoupper((string)$method);
		if (($method != 'POST' && $method != 'GET') || strlen($link) < 12) {
			throw new \Exception('Invalid parameters');
		}
		$html = '<form style="display:none;" name="xform" method="' . $method . '" action="' . $link . '">';
		foreach ($submitData as $k => $v) {
			$html .= '<input name="' . $k . '" type="text" value="' . $v . '"/>';
		}
		$html .= '</form><script type="text/javascript">document.xform.submit();</script>';
		return $html;
	}

	/**
	 * 循环寻找上级, 并返回表单数据
	 * @param string $url
	 * @param array  $rawData
	 * @return string|null
	 * @throws \Exception
	 */
	public function looping(string $url, array $rawData) {
		$res  = ['url' => $url, 'data' => $rawData];
		$data = NULL;
		while (!$data) {
			$res = $this->curlPost($res['url'], $res['data']);
			// 302或301 重定向的数据
			if (filter_var($res, FILTER_VALIDATE_URL)) {
				$uri = parse_url($res);
				$link = $uri['scheme'] . '://'. $uri['host']. (isset($uri['port']) ? ':'.$uri['port'] : '') . $uri['path'];
				parse_str($uri['query'], $params);
				$data = $this->resubmit('GET', $link, $params);
				break;
			}
			$res = $this->parseHtmlForm($res);
			if (strpos($res['url'], 'https://') !== FALSE) {
				$data = $this->resubmit('POST', $res['url'], $res['data']);
				break;
			}
		}
		return $data;
	}
}
