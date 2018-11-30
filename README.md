## Captcha  
![](./img/demo1.png)     ![](./img/demo2.png)     ![](./img/demo3.png)     ![](./img/demo4.png)
## Install
```
composer require ks/captcha
```
## USAGE
```
$Captcha = new Captcha();
//输出图片
$Captcha->outPut();
//获取图片验证码
$code = $Captcha->getCode();
```
## About
公司大神留下的验证码类库