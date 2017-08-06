<?php
namespace app\admin\controller;
use \think\Controller;
use \think\Session;
use \think\Cookie;
use \think\Db;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch('login');
    }

    public function verify(){//验证登录
        if(captcha_check($_POST['yzm'])){
            $admin['user_name'] = $_POST['username'];
            $admin['user_pwd'] = md5($_POST['password']);
            $re = Db::table('user')->where($admin)->find();
            if($re){
                if(!empty($_POST['online'])){
                    Cookie::set('online','1');
                }else{
                    Cookie::delete('online');
                }
                $group = Db::table('group')->where('group_id',$re['user_group'])->find();
                if($group['group_name'] == '超级管理员'){
                    Session::set('user',array('name'=>$re['user_name'],'group'=>$group['group_name']));
                }else{
                    $power = Db::table('authority')->where('authority_group = "'.$re['user_group'].'"')->find();
                    $power['authority_power'] = json_decode($power['authority_power'],true);
                    Session::set('user',array('name'=>$re['user_name'],'group'=>$group['group_name'],'power'=>$power['authority_power']));
                }
                $this->redirect('admin/index/index');
            }
        }else{
            $this->error('验证码错误','admin/login/index',3);
        }
    }

    public function login_out(){
        Session::delete('user');
        $this->redirect('admin/login/index');
    }

    public function show(){
        var_dump(Session::get('user'));
    }

}