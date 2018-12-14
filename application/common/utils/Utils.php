<?php
/**
 * Created by PhpStorm.
 * User: pis0sion
 * Date: 18-12-2
 * Time: 下午9:42
 */

namespace app\common\utils;


class Utils
{

    public static function showReturn($code,$msg,$url = "")
    {
        return compact('code','msg','url') ;
    }
}