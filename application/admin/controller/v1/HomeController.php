<?php
/**
 * Created by PhpStorm.
 * User: pis0sion
 * Date: 18-12-2
 * Time: 下午5:40
 */

namespace app\admin\controller\v1;


class HomeController
{
    public function index()
    {
        return view("home/index");
    }
}