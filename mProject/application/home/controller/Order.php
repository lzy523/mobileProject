<?php

namespace app\home\controller;

use think\Controller;
use think\Request;

class Order extends Controller
{
   public function order(){
       return view();
   }
    //空方法
    public function _empty($name){
        return $name.'方法不存在！';
    }
}
