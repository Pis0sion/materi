<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/2
 * Time: 14:00
 */

namespace app\common\validate;


class LoginValidate extends BaseValidate
{
    protected $rule = [
        "mobile" => "require|isMobile",
        "passwd" => 'require|isPassword',
    ];

    protected $message = [
        'mobile.require' => '请填写手机号',
        'mobile.isMobile' => '手机号不正确',
        'passwd.require' => '请填写密码',
        'passwd.isPassword' => '请输入6-18位数字，字母或下划线',
    ];

}