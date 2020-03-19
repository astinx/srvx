<?php

$data        = [];
$data['uid'] = '123456';
$data['key'] = md5('123456');
$data['url'] = 'http://47.104.23.74/write.php';

$data['aes_key']     = '4rfv(IJN!QAZ0okm';
$data['aes_mode']    = 'AES-128-CBC';
$data['encrypt_url'] = AesEncrypt($data['url'], $data['aes_key']);

$args = [
	'uid' => $data['uid'],
	'sender' => '10086',
	'time' => time(),
	'content'=> '这里是测试文本'
];
ksort($args);
$data['sign_format'] = urldecode(http_build_query($args)).'&key='.$key;

echo json_encode($data, 320);

function jsonToPost() {
	$data = json_decode(file_get_contents('php://input'), TRUE);
	is_array($data) && $data && ($_POST = $data);
}

/**
 * 错误返回
 * @param string $msg
 * @param int    $code
 * @param array  $data
 */
function showMsg($msg = '', $code = 400, $data = []) {
	in_array($code, [200, 400, 401, 402, 403, 404, 405, 406, 409, 500]) ? header('HTTP/2 ' . $code) : header('HTTP/2 200 OK');
	header('Content-Type:application/json; charset=utf-8');
	die(json_encode(['code' => $code, 'msg' => $msg, 'data' => $data], 320));
}

function AesEncrypt($str, $key, $bit = 128, $iv = '') {
	// gen key
	$key = $bit == 256 ? hash('SHA256', $key, TRUE) : hash('MD5', $key, TRUE);
	// gen iv
	$iv   = ($iv != '') ? hash('MD5', $iv, TRUE) : chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0);
	$data = openssl_encrypt($str, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
	return base64_encode($data);
}

function AesDecrypt($str, $key, $bit = 128, $iv = '') {
	// gen key
	$key = $bit == 256 ? hash('SHA256', $key, TRUE) : hash('MD5', $key, TRUE);
	// gen iv
	$iv        = ($iv != '') ? hash('MD5', $iv, TRUE) : chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0) . chr(0);
	$decrypted = openssl_decrypt(base64_decode($str), 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
	return $decrypted;
}