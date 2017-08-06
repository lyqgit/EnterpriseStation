<?php
namespace app\admin\controller;
use \think\Controller;
use \think\Session;
use \think\Db;

class Index extends Base{
    public function index(){//主页
        $this->assign('user',Session::get('user'));
        return $this->fetch('index');
    }

    public function welcome(){//欢迎页
        return $this->fetch('welcome');
    }

    public function article_list(){
        $article = Db::table('article')->order('article_id desc')->select();
        $type = Db::table('article_category')->select();
        foreach($article as $k=>$v){
            $article[$k]['article_time'] = date('Y-m-d h:i:s',$v['article_time']);
            foreach($type as $vv){
                if($v['article_type'] == $vv['category_id']){
                    $article[$k]['article_type'] = $vv['category_name'];
                }
            }
            

        }
        $this->assign('article',$article);
        return $this->fetch('article_list');
    }

    public function article_add(){
        $category = Db::table('article_category')->where("category_pid != '0'")->select();
        $this->assign('category',$category);
        $this->assign('time',date('Y-m-d h:i:s'));
        return $this->fetch('article_add');
    }

    public function article_class(){//新闻分类页
        $class = Db::table('article_category')->where('category_pid',0)->find();
        $category = Db::table('article_category')->order('category_id desc')->where('category_pid',1)->select();
        foreach($category as $k=>$v){
            if($v['category_pid'] == '1'){
                $category[$k]['pid_name'] = $class['category_name'];
            }
        }
        $this->assign('class',$class);
        $this->assign('category',$category);
        return $this->fetch('article_class');
    }

    public function admin_list(){//管理员列表
        $admin = Db::table('user')->alias('u')->join('group g','u.user_group = g.group_id')->order('u.user_id desc')->select();
        $this->assign('admin',$admin);
        return $this->fetch('admin_list');
    }

    public function admin_power(){
        $power = Db::table('authority')->alias('a')->join('group g','a.authority_group = g.group_id')->order('a.authority_id desc')->select();
        foreach($power as $k=>$v){
            $t = json_decode($v['authority_power'],true);
            $power[$k]['lm'] = '';
            foreach($t as $kk=>$vv){
                if($vv == '1'){
                    $power[$k]['lm'] .= $kk.',';
                }
            }
            $power[$k]['lm'] = rtrim($power[$k]['lm'],',');
            unset($t);
        }
        $this->assign('power',$power);
        return $this->fetch('admin_power');
    }

    public function admin_add(){
        $group = Db::table('group')->select();
        $this->assign('group',$group);
        return $this->fetch('admin_add');
    }

    public function power_add(){
        /*$article_a = Db::table('article_category')->select();
        $product_a = Db::table('product_category')->select();
        unset($group[0]);
        $class = [];
        foreach($article_a as $k=>$v){
            if($v['category_pid'] == '0'){
                $class['article'] = $v;
            }else{
                $class['article']['child'][] = $v;
            }
        }

        foreach($product_a as $k=>$v){
            if($v['category_pid'] == '0'){
                $class['product'] = $v;
            }else{
                $class['product']['child'][] = $v;
            }
        }
        $this->assign('class',$class);
        */
        $class = Db::table('col')->select();
        $this->assign('class',$class);
        return $this->fetch('power_add');
    }

    public function feedback_list(){
        $message = Db::table('message')->order('message_id desc')->select();
        $this->assign('message',$message);
        return $this->fetch('feedback_list');
    }

    public function product_list(){
        $article = Db::table('product')->order('product_id desc')->select();
        $type = Db::table('product_category')->select();
        foreach($article as $k=>$v){
            $article[$k]['product_time'] = date('Y-m-d h:i:s',$v['product_time']);
            foreach($type as $vv){
                if($v['product_type'] == $vv['category_id']){
                    $article[$k]['product_type'] = $vv['category_name'];
                }
            }

        }
        $this->assign('article',$article);
        return $this->fetch('product_list');
    }

    public function product_add(){
        $category = Db::table('product_category')->where("category_pid != '0'")->select();
        $this->assign('category',$category);
        $this->assign('time',date('Y-m-d h:i:s'));
        return $this->fetch('product_add');
    }

    public function product_class(){//新闻分类页
        $class = Db::table('product_category')->where('category_pid',0)->find();
        $category = Db::table('product_category')->order('category_id desc')->where('category_pid',1)->select();
        foreach($category as $k=>$v){
            if($v['category_pid'] == '1'){
                $category[$k]['pid_name'] = $class['category_name'];
            }
        }
        $this->assign('class',$class);
        $this->assign('category',$category);
        return $this->fetch('product_class');
    }

}