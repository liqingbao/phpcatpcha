<?php
require "./Captcha.php";

$Captcha = new Captcha();
//输出图片
$Captcha->outPut();
//获取图片验证码
$code = $Captcha->getCode();