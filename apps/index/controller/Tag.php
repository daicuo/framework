<?php
namespace app\index\controller;

use app\common\controller\Front;

class Tag extends Front
{
    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        return 'my action is demo';
    }
}