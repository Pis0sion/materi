<?php
/**
 * Created by PhpStorm.
 * User: pis0sion
 * Date: 18-12-3
 * Time: 下午9:09
 */

namespace app\admin\service;


use Omnipay\Omnipay;

class AliPayService
{
    protected $config ;

    protected $gateway ;

    public function __construct()
    {
        $this->gateway = Omnipay::create("Alipay_AopWap") ;
        $this->gateway->setSignType(config("alipay.sign_type")); //RSA/RSA2
        $this->gateway->setAppId(config("alipay.app_id"));
        $this->gateway->setPrivateKey(config("alipay.private_key"));
        $this->gateway->setAlipayPublicKey(config("alipay.public_key"));
        $this->gateway->setNotifyUrl(config("alipay.notify_url"));
    }

    public function purchase()
    {
        $request = $this->gateway->purchase();
        $request->setBizContent([
            'out_trade_no' => date('YmdHis') . mt_rand(1000, 9999),
            'total_amount' => 0.01,
            'subject'      => 'VIP',
            'product_code' => 'QUICK_WAP_PAY',
        ]);

        $response = $request->send();
        $response->redirect();
    }


}