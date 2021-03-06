<?php
function b64dec($b64) { //64进制转换成10进制
	$map = array(
		'0'=>0,'1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9, //10
		'A'=>10,'B'=>11,'C'=>12,'D'=>13,'E'=>14,'F'=>15,'G'=>16,'H'=>17,'I'=>18,'J'=>19, //10
		'K'=>20,'L'=>21,'M'=>22,'N'=>23,'O'=>24,'P'=>25,'Q'=>26,'R'=>27,'S'=>28,'T'=>29, //10
		'U'=>30,'V'=>31,'W'=>32,'X'=>33,'Y'=>34,'Z'=>35,'a'=>36,'b'=>37,'c'=>38,'d'=>39, //10
		'e'=>40,'f'=>41,'g'=>42,'h'=>43,'i'=>44,'j'=>45,'k'=>46,'l'=>47,'m'=>48,'n'=>49, //10
		'o'=>50,'p'=>51,'q'=>52,'r'=>53,'s'=>54,'t'=>55,'u'=>56,'v'=>57,'w'=>58,'x'=>59, //10
		'y'=>60,'z'=>61,'_'=>62,'='=>63 //64
	);
	$dec = 0;
	$len = strlen($b64);
	for ($i = 0; $i < $len; $i++) {
		$b = $map[$b64{$i}];
		if ($b === NULL) {
			return FALSE;
		}
		$j = $len - $i - 1;
		$dec += ($j == 0 ? $b : (2 << (6 * $j - 1)) * $b);
	}
	return $dec;
}

function decb64($dec) { //10进制转换成64进制
	if ($dec < 0) {
		return FALSE;
	}
	$map = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', //10
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', //20
		'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', //30
		'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', //40
		'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', //50
		'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', //60
		'y', 'z', '_', '='];
	$b64 = '';
	do {
		$b64 = $map[($dec % 64)] . $b64;
		$dec /= 64;
	} while ($dec >= 1);
	return $b64;
}