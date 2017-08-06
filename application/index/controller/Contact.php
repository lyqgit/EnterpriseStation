<?php
namespace app\index\controller;
use \think\Controller;

class Contact extends Controller
{
    public function index()
    {
        return $this->fetch('contact');
    }
}