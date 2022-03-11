<?php
namespace app\index\controller;

use app\common\controller\Front;

class Index extends Front
{

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        return $this->fetch();
    }
    
    public function demo()
    {
        return 'my action is demo';
    }
    
    public function test()
    {
        return 'my action is test';
    }
    
    //资源路由 index create save read edit update delete 
    //请求类型 get   get    post get  get  put    delete
}