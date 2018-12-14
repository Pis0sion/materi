<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/3
 * Time: 17:57
 */

namespace app\admin\controller\v1;


class MyTeamController
{
    public function show($id)
    {
        return view("my_team/index");
    }
}