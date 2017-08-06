<?php
namespace app\admin\controller;
use \think\Controller;
use \think\Session;
use \think\Cookie;
use \think\Db;

class Admin extends Base{
    public function add(){
        $add['user_name'] = $_POST['admin'];
        $add['user_pwd'] = md5($_POST['password']);
        $add['user_group'] = $_POST['role'];
        if(Db::table('user')->insert($add)){
            return true;
        }else{
            return false;
        }
    }

    public function del(){
        return Db::table('user')->delete($_POST['user_id']);
    }

    public function del_all(){
        if(Db::table('user')->delete($_POST['id'])){
            $this->success('删除成功','admin/index/admin_list',[],1);
        }else{
            $this->error('删除失败','admin/index/admin_list',[],1);
        }
    }

    public function admin_edit(){
        $edit = Db::table('user')->where('user_id',input('user_id'))->find();
        $group = Db::table('group')->select();
        $this->assign('group',$group);
        $this->assign('edit',$edit);
        return $this->fetch('admin_edit');
    }

    public function edit(){
        $edit['user_name'] = $_POST['admin'];
        $edit['user_id'] = $_POST['id'];
        if(!empty($_POST['password'])){
            $edit['user_pwd'] = md5($_POST['password']);
        }
        $edit['user_group'] = $_POST['role'];
        return Db::table('user')->update($edit);
    }

    public function power_add(){
        if(!empty($_POST['role'])){
            $group['group_name'] = $_POST['role'];
            if(Db::table('group')->where('group_name',$group['group_name'])->find()){
                return false;
            }
            $add = [];
            if($add['authority_group'] = Db::table('group')->insertGetId($group)){
                unset($_POST['role']);
                $add['authority_power'] = json_encode($_POST,JSON_UNESCAPED_UNICODE);
                if(DB::table('authority')->insert($add)){
                    return true;
                }else{
                    return false;
                }
            }
        }
        //return json_encode($_POST,JSON_UNESCAPED_UNICODE);
    }

    public function power_del(){
        if(Db::table('authority')->delete($_POST['authority_id'])){
            return Db::table('group')->delete($_POST['authority_group']);
        }
    }

    public function power_edit_show(){
        $edit = Db::table('authority')->alias('a')->where('authority_id',input('authority_id'))->join('group g','a.authority_group = g.group_id')->find();
        $edit['authority_power'] = json_decode($edit['authority_power'],true);
        $this->assign('edit',$edit);
        return $this->fetch('power_edit');
    }

    public function power_edit(){
        if(!empty($_POST['role'])){
            $group['group_name'] = $_POST['role'];
            $group['group_id'] = $_POST['group_id'];
            $edit = [];
            if(Db::table('group')->update($group) !== false){
                $edit['authority_id'] = $_POST['authority_id'];
                unset($_POST['role']);
                unset($_POST['authority_id']);
                unset($_POST['group_id']);
                $edit['authority_power'] = json_encode($_POST,JSON_UNESCAPED_UNICODE);
                if(DB::table('authority')->update($edit) !== false){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }

}