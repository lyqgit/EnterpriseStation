<?php
namespace app\admin\controller;
use \think\Controller;
use \think\Session;
use \think\Cookie;

class Base extends Controller{
    public function __construct(){
        parent::__construct();
        if(Session::get('user')){

        }else{
            $this->error('请登录','admin/login/index');
        }
    }
}