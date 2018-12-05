<?php
namespace Ks;

class Captcha
{
    //随机因子
    private $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';
    //要输出的验证码
    private $Captcha;
    //验证码长度
    private $CaptchaLength = 4;
    //宽度
    private $width = 130;
    //高度
    private $height = 50;
    //图形资源句柄
    private $img;
    //指定的字体
    private $font;
    //指定字体大小
    private $fontSize = 25;

    public function __construct($params = array())
    {
        //注意字体路径要写对，否则显示不了图片
        $this->font = __DIR__ . '/Elephant.ttf';
        if (isset($params['length'])) {
            $this->CaptchaLength = $params['length'];
        }

        if (isset($params['width'])) {
            $this->width = $params['width'];
        }

        if (isset($params['height'])) {
            $this->height = $params['height'];
        }

        if (isset($params['fontSize'])) {
            $this->fontSize = $params['fontSize'];
        }

    }
    //生成随机码
    private function createCaptcha()
    {
        $_len = strlen($this->charset) - 1;
        for ($i = 0; $i < $this->CaptchaLength; $i++) {
            $this->Captcha .= $this->charset[mt_rand(0, $_len)];
        }
    }
    //生成背景
    private function createBg()
    {
        $this->img = imagecreatetruecolor($this->width, $this->height);
        $color     = imagecolorallocate($this->img, mt_rand(157, 255), mt_rand(157, 255), mt_rand(157, 255));
        imagefilledrectangle($this->img, 0, $this->height, $this->width, 0, $color);
    }
    //生成文字
    private function createFont()
    {
        $_x = $this->width / $this->CaptchaLength;
        for ($i = 0; $i < $this->CaptchaLength; $i++) {
            $color = imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
            imagettftext($this->img, $this->fontSize, mt_rand(-30, 30), $_x * $i + mt_rand(1, 5), $this->height / 1.4, $color, $this->font, $this->Captcha[$i]);
        }
    }
    //生成线条、雪花
    private function createLine()
    {
        //线条
        for ($i = 0; $i < 10; $i++) {
            $color = imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
            imageline($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height), $color);
        }
        //雪花
        for ($i = 0; $i < 100; $i++) {
            $color = imagecolorallocate($this->img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
            imagestring($this->img, mt_rand(1, 5), mt_rand(0, $this->width), mt_rand(0, $this->height), '*', $color);
        }
    }
    //输出
    private function out()
    {
        header('Content-type:image/png');
        imagepng($this->img);
        imagedestroy($this->img);
    }
    //对外生成
    public function outPut()
    {
        $this->createBg();
        $this->createCaptcha();
        $this->createLine();
        $this->createFont();
        $this->out();
    }
    //获取验证码
    public function getCaptcha()
    {
        return strtolower($this->Captcha);
    }
}
