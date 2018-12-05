# phpcatpcha
## Captcha Preview  
![](./img/demo1.png)     ![](./img/demo2.png)     ![](./img/demo3.png)     ![](./img/demo4.png)
## Install
```
composer require ks/captcha
```
## Usage
```
require './vendor/autoload.php';

use Ks\Captcha;
$Captcha = new Captcha();

//输出图片 output image
$Captcha->outPut();
//获取图片验证码
$code = $Captcha->getCaptcha();

//可以自定义
$config = [
	'length' => 5,//默认 4
	'width' => 150,//宽度 默认150
	'height' => 50,//高度 默认50
	'fontSize' => 28,//字体大小 默认25
];
$Captcha = new Captcha($config);
$Captcha->outPut();
```
## About
公司大神留下的验证码类库 折腾了好久 终于发布到Packagist