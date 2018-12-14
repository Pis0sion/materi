<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::miss('public/miss');

Route::group('/',function(){
    // 登陆
    Route::get("login","admin/v1.Entry/index");
    // 登陆提交
    Route::post("login","admin/v1.Entry/formLogin");
    // 忘记密码
    Route::get("forget","admin/v1.Entry/forgetPassword");
    // 提交忘记密码
    Route::post("alter","admin/v1.Entry/alterPwd");
    // 注册页面
    Route::get("register","admin/v1.Entry/register");
    // 注册提交
    Route::post("register","admin/v1.Entry/formRegister");

});

Route::group('admin/:version',function(){
    // 主页面
    Route::get("home","admin/:version.Home/index");
    // 我的等级
    Route::get("grade","admin/:version.MyGrade/show");
    // 点击下单
    Route::get("place","admin/:version.MyGrade/placeOrder");
    // 我的团队
    Route::get("team/:id","admin/:version.MyTeam/show");

})->middleware(['authorize']);