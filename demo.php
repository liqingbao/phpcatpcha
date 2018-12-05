<?php
require "./src/Captcha.php";
$config = [
	'length' => 5,
	'width' => 150,
	'height' => 50,
	'fontSize' => 28,
];
// $Captcha = new Ks\Captcha();
$Captcha = new Ks\Captcha($config);
//输出图片
$Captcha->outPut();
//获取图片验证码
$Captcha = $Captcha->getCaptcha();
file_put_contents('./Captcha.log', date('Y-m-d H:i:s') . ":" . $Captcha . "\n", FILE_APPEND);