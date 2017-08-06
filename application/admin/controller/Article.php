<?php
namespace app\admin\controller;
use \think\Controller;
use \think\Session;
use \think\Cookie;
use \think\File;
use \think\Db;

class Article extends Base{
    public function add(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            $article['article_title'] = $_POST['title'];
            $article['article_type'] = $_POST['type'];
            $article['article_abstract'] = $_POST['abstract'];
            $article['article_author'] = $_POST['author'];
            $article['article_time'] = strtotime($_POST['time']);
            $article['article_content'] = htmlspecialchars($_POST['editorValue']);
            $article['article_image'] = '/wlcg/public/uploads/'.str_replace('\\','/',$info->getSaveName());
            $add = Db::table('article')->insert($article);
            if($add){
                $this->success('添加成功','admin/index/article_add',[],1);
            }else{
                $this->error('添加失败','admin/index/article_add',[],1);
            }
        }else{
            $this->error('上传图片失败','admin/index/article_add',[],1);
        }
    }

    public function del(){
        $re = Db::table('article')->delete($_POST['article_id']);
        if($re){
            return unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$_POST['article_image']);
        }else{
            return false;
        }
    }

    public function del_all(){
        /*var_dump($_POST['article_id']);*/
        //var_dump(unlink(dirname(dirname(dirname(dirname(__FILE__)))).substr($_POST['article_image'][7],5)));
        $id = [];
        $img = [];
        foreach($_POST['article_id'] as $kk=>$vv){
            $id[] = explode('/',$vv)[0];
            $img[] = substr($vv,strlen($id[$kk]));
        }
        /*echo dirname(dirname(dirname(dirname(dirname(__FILE__)))));
        var_dump($id);
        var_dump($img);*/
        $re = Db::table('article')->delete($id);
        if($re){
            foreach($img as $v){
                unlink(dirname(dirname(dirname(dirname(dirname(__FILE__))))).$v);
            }
            $this->success('删除成功','admin/index/article_list',[],1);
        }else{
            $this->error('删除失败','admin/index/article_list',[],1);
        }

    }

    public function edit_show(){
        $article = Db::table('article')->where('article_id',input('article_id'))->find();
        /*var_dump($_SERVER);
        var_dump(input('article_id'));*/
        $category = Db::table('article_category')->where("category_pid != '0'")->select();
        $this->assign('category',$category);
        $article['article_content'] = htmlspecialchars_decode($article['article_content']);
        $this->assign('article',$article);
        $this->assign('time',date('Y-m-d h:i:s'));
        return $this->fetch('article_edit');
    }

    public function edit(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        $article = [];
        if($file){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            $article['article_image'] = '/wlcg/public/uploads/'.str_replace('\\','/',$info->getSaveName());
        }

        $article['article_id'] = $_POST['id'];
        $article['article_title'] = $_POST['title'];
        $article['article_type'] = $_POST['type'];
        $article['article_abstract'] = $_POST['abstract'];
        $article['article_author'] = $_POST['author'];
        $article['article_time'] = strtotime($_POST['time']);
        $article['article_content'] = htmlspecialchars($_POST['editorValue']);

        $edit = Db::table('article')->update($article);
        if($edit){
            $this->success('修改成功',url('admin/article/edit_show',array('article_id'=>$_POST['id'])),[],1);
        }else{
            $this->error('修改失败',url('admin/article/edit_show',array('article_id'=>$_POST['id'])),[],1);
        }

    }

    public function category_add(){
        $add['category_pid'] = $_POST['pid'];
        $add['category_name'] = $_POST['category_name'];
        if(Db::table('article_category')->insert($add)){
            $this->success('添加成功','admin/index/article_class',[],1);
        }else{
            $this->error('添加失败','admin/index/article_class',[],1);
        }
    }

    public function category_edit_show(){
        $class = Db::table('article_category')->where('category_pid',0)->find();
        $category = Db::table('article_category')->where('category_id',input('category_id'))->find();
        if($category['category_pid'] == $class['category_id']){
            $category['category_pid_name'] = $class['category_name'];
        }
        $this->assign('category',$category);
        return $this->fetch('article_class_edit');
    }

    public function category_edit(){
        $edit['category_pid'] = $_POST['type'];
        $edit['category_name'] = $_POST['category_name'];
        $edit['category_id'] = $_POST['category_id'];
        if(Db::table('article_category')->update($edit)){
            $this->success('添加成功',url('admin/article/category_edit_show',['category_id'=>$_POST['category_id']]),[],1);
        }else{
            $this->success('添加失败',url('admin/article/category_edit_show',['category_id'=>$_POST['category_id']]),[],1);
        }
    }

    public function category_del(){
        return Db::table('article_category')->delete($_POST['category_id']);
    }

}