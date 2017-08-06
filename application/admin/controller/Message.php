<?php
namespace app\admin\controller;
use \think\Controller;
use \think\Session;
use \think\Cookie;
use \think\Db;

class Message extends Base{
    public function del(){
        return Db::table('message')->delete($_POST['message_id']);
    }
    public function del_all(){
        if(!empty($_POST['id'])){
            if(Db::table('message')->delete($_POST['id'])){
                $this->success('删除成功','admin/index/feedback_list',[],1);
            }else{
                $this->error('删除失败','admin/index/feedback_list',[],1);
            }
        }else{
            $this->error('删除失败','admin/index/feedback_list',[],1);
        }
    }
}