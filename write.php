<?php
$_SERVER['REQUEST_METHOD'] !== 'POST' && showMsg('必须为post请求');
empty($_POST) && jsonToPost();

$data            = [];
$data['uid']     = $_POST['uid'];
$data['sender']  = $_POST['sender'];
$data['time']    = $_POST['time'];
$data['content'] = $_POST['content'];
$sign            = $_POST['sign'];
$key             = md5('123456');
$aesKey          = '4rfv(IJN!QAZ0okm';
$sign            = $_POST['sign'];

$data['uid'] !== '123456' && showMsg('用户不存在');
// $sign != getSign($data, $key) && showMsg('签名不正确');
file_put_contents('sms.log', json_encode($data,320), FILE_APPEND);
showMsg('保存成功', 0);

function getSign($arr, $key) {
	ksort($arr);
	return md5(urldecode(http_build_query($arr)).'&key='.$key);
}

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