<?php
/**
 * Created by PhpStorm.
 * User: pis0sion
 * Date: 18-12-2
 * Time: 下午4:52
 */

namespace app\admin\controller\v1;


use app\admin\http\HttpRequest;
use app\admin\repositories\UserRepositories;

class EntryController
{
    protected $entryRepositories ;

    public function __construct(UserRepositories $entryRepositories)
    {
        $this->entryRepositories = $entryRepositories ;
    }

    public function index()
    {
        return view("entry/login");
    }

    public function formLogin(HttpRequest $request)
    {
        return $this->entryRepositories->login($request);
    }

    public function register()
    {
        return view("entry/register");
    }

    public function formRegister(HttpRequest $request)
    {
        return $this->entryRepositories->register($request);
    }

    public function forgetPassword()
    {
        return view("entry/forget");
    }

    public function alterPwd()
    {

    }

}