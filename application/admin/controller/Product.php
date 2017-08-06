<?php
namespace app\admin\controller;
use \think\Controller;
use \think\Session;
use \think\Cookie;
use \think\Db;

class Product extends Base{
    public function add(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            $article['product_name'] = $_POST['title'];
            $article['product_type'] = $_POST['type'];
            $article['product_description'] = $_POST['abstract'];
            $article['product_time'] = strtotime($_POST['time']);
            $article['product_content'] = htmlspecialchars($_POST['editorValue']);
            $article['product_image'] = '/wlcg/public/uploads/'.str_replace('\\','/',$info->getSaveName());
            $add = Db::table('product')->insert($article);
            if($add){
                $this->success('添加成功','admin/index/product_add',[],1);
            }else{
                $this->error('添加失败','admin/index/product_add',[],1);
            }
        }else{
            $this->error('上传图片失败','admin/index/product_add',[],1);
        }
    }

    public function del(){
        $re = Db::table('product')->delete($_POST['product_id']);
        if($re){
            return unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$_POST['product_image']);
        }else{
            return false;
        }
    }

    public function del_all(){
        /*var_dump($_POST['article_id']);*/
        //var_dump(unlink(dirname(dirname(dirname(dirname(__FILE__)))).substr($_POST['article_image'][7],5)));
        $id = [];
        $img = [];
        foreach($_POST['product_id'] as $kk=>$vv){
            $id[] = explode('/',$vv)[0];
            $img[] = substr($vv,strlen($id[$kk]));
        }
        /*echo dirname(dirname(dirname(dirname(dirname(__FILE__)))));
        var_dump($id);
        var_dump($img);*/
        $re = Db::table('product')->delete($id);
        if($re){
            foreach($img as $v){
                unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$v);
            }
            $this->success('删除成功','admin/index/product_list',[],1);
        }else{
            $this->error('删除失败','admin/index/product_list',[],1);
        }

    }

    public function edit_show(){
        $article = Db::table('product')->where('product_id',input('product_id'))->find();
        /*var_dump($_SERVER);
        var_dump(input('article_id'));*/
        $category = Db::table('product_category')->where("category_pid != '0'")->select();
        $this->assign('category',$category);
        $article['product_content'] = htmlspecialchars_decode($article['product_content']);
        $this->assign('article',$article);
        $this->assign('time',date('Y-m-d h:i:s'));
        return $this->fetch('product_edit');
    }

    public function edit(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        $article = [];
        if($file){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            $article['product_image'] = '/wlcg/public/uploads/'.str_replace('\\','/',$info->getSaveName());
        }

        $article['product_id'] = $_POST['id'];
        $article['product_name'] = $_POST['title'];
        $article['product_type'] = $_POST['type'];
        $article['product_description'] = $_POST['abstract'];
        $article['product_time'] = strtotime($_POST['time']);
        $article['product_content'] = htmlspecialchars($_POST['editorValue']);

        $edit = Db::table('product')->update($article);
        if($edit){
            $this->success('修改成功',url('admin/product/edit_show',array('product_id'=>$_POST['id'])),[],1);
        }else{
            $this->error('修改失败',url('admin/product/edit_show',array('product_id'=>$_POST['id'])),[],1);
        }

    }

    public function category_add(){
        $add['category_pid'] = $_POST['pid'];
        $add['category_name'] = $_POST['category_name'];
        if(Db::table('product_category')->insert($add)){
            $this->success('添加成功','admin/index/product_class',[],1);
        }else{
            $this->error('添加失败','admin/index/product_class',[],1);
        }
    }

    public function category_edit_show(){
        $class = Db::table('product_category')->where('category_pid',0)->find();
        $category = Db::table('product_category')->where('category_id',input('category_id'))->find();
        if($category['category_pid'] == $class['category_id']){
            $category['category_pid_name'] = $class['category_name'];
        }
        $this->assign('category',$category);
        return $this->fetch('product_class_edit');
    }

    public function category_edit(){
        $edit['category_pid'] = $_POST['type'];
        $edit['category_name'] = $_POST['category_name'];
        $edit['category_id'] = $_POST['category_id'];
        if(Db::table('product_category')->update($edit)){
            $this->success('修改成功',url('admin/product/category_edit_show',['category_id'=>$_POST['category_id']]),[],1);
        }else{
            $this->success('修改失败',url('admin/product/category_edit_show',['category_id'=>$_POST['category_id']]),[],1);
        }
    }

    public function category_del(){
        return Db::table('product_category')->delete($_POST['category_id']);
    }
}