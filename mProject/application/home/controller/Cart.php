<?php

namespace app\home\controller;

use think\Controller;
use think\Request;

class Cart extends Controller
{
    public function shopcart(){
        return view();
    }
    //空方法
    public function _empty($name){
        return $name.'方法不存在！';
    }
}
