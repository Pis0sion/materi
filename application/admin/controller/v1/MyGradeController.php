<?php
/**
 * Created by PhpStorm.
 * User: pis0sion
 * Date: 18-12-3
 * Time: 下午8:44
 */

namespace app\admin\controller\v1;

//  我的等级
class MyGradeController
{
    //   显示页面
    public function show()
    {
        $users = app()->auth ;
        return view("my_grade/index",compact('users'));
    }

    //   下订单
    public function placeOrder()
    {

        $this->purchase();
    }

    //   购买
    public function purchase()
    {
        return app("alipay")->purchase();
    }


}