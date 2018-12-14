<?php
/**
 * Created by PhpStorm.
 * User: pis0sion
 * Date: 18-12-2
 * Time: 下午8:52
 */

namespace app\admin\repositories;


use app\admin\model\User;
use app\common\utils\Utils;
use think\facade\Cookie;
use think\facade\Session;

class UserRepositories
{
    //   登陆
    public function login($request)
    {
        $args = $request->loginVars();
        $this->remeberMobile($args);
        if($user = $this->hasUserByMobile($args['mobile']))
        {
            if($this->hasMatchPwd($user,$args['passwd']))
            {
                session("userinfo",$user);
                return Utils::showReturn("0000","登陆成功","/admin/v1/home");
            }
        }
        return Utils::showReturn("0005","手机号或者密码不正确");
    }

    //   添加新的用户
    public function register($request)
    {
        $newUser = $request->registerVars();

        if ($this->hasUserByMobile($newUser['mobile']))
        {
            //  已经注册
            return Utils::showReturn('0001', '用户已经注册');
        }

        $newUser['passwd'] = md5($newUser['passwd']);

        if (!$newUser['agent'])
        {
            return User::saveNewUser($newUser);
        }

        if ($agent = $this->hasUserByMobile($newUser['agent']))
        {
            $newUser['pid'] = $agent->id;
            return User::saveNewUser($newUser);
        }
        //  上级用户不存在
        return Utils::showReturn('0002', '上级用户不存在');
    }

    //   根据手机号查询用户
    public function hasUserByMobile($mobile)
    {
        return User::getByMobile($mobile);
    }

    //    密码是否相等
    public function hasMatchPwd($user,$pwd)
    {
        return $user->passwd == md5($pwd);
    }
    //    记住密码
    public function remeberMobile($args)
    {
        $state = $args['remember-me'] ?? "";
        if($state == "on")
        {
            Cookie::forever("logins",$args);
        }
        else
        {
            Cookie::delete("logins");
        }
    }

    //    登出
    public function loginOut()
    {
        Session::clear();
        return redirect("/login");
    }

}