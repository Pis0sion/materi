<?php
/**
 * Created by PhpStorm.
 * User: pis0sion
 * Date: 18-12-2
 * Time: 下午8:56
 */

namespace app\admin\http;


use app\common\validate\LoginValidate;
use think\Request;

class HttpRequest extends Request
{
    //登陆
    public function loginVars()
    {
        (new LoginValidate())->gocheck();
        return  $this->only(['mobile','passwd','remember-me']);
    }

    // 注册
    public function registerVars()
    {
        return  $this->only(['username','mobile','passwd','agent']);
    }
}