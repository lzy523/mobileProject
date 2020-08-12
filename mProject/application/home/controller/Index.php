<?php
namespace app\home\controller;

class Index
{
    public function index()
    {
        return view();
    }
    //空方法
    public function _empty($name){
        return $name.'方法不存在！';
    }
}
