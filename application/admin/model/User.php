<?php
/**
 * Created by PhpStorm.
 * User: pis0sion
 * Date: 18-12-2
 * Time: 下午8:40
 */

namespace app\admin\model;


use app\common\utils\Utils;
use app\lib\enum\GradeSetting;
use think\Model;

class User extends Model
{
    protected $table = "lt_user" ;

    protected $createTime = "create_at";

    protected $updateTime = "update_at";

    protected $autoWriteTimestamp = true ;


    //  获取器

    public function getGradeAttr($value,$data)
    {
        $status = GradeSetting::GRADE ;
        return $status[$value];
    }

    public function getNextGradeAttr($value,$data)
    {
        $status = GradeSetting::GRADE ;
        $next = $data['grade'] + 1 ;
        if(array_key_exists($next,$status))
        {
            return $status[$next];
        }
        return $status[$data['grade']];
    }

    //
    public static function saveNewUser($user)
    {
        if(self::create($user))
        {
            return Utils::showReturn('0000','注册成功');
        }
        else
        {
            return Utils::showReturn('0004','注册失败');
        }
    }

}