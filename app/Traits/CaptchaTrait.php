<?php
namespace App\Traits;

use Request;
use ReCaptcha\ReCaptcha;

trait CaptchaTrait {

    public function captchaCheck()
    {
        $response = Request::input('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('RECAPTCHA_SECRET_KEY');
        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return 1;
        } else {
            return 0;
        }
    }
}
