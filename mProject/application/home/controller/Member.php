<?php

namespace app\home\controller;

use think\Controller;
use think\Request;

class Member extends Controller
{
    public function member(){
        return view();
    }
    //空方法
    public function _empty($name){
        return $name.'方法不存在！';
    }
}
