<?php
namespace app\home\controller;

use app\common\model\Paint;

class Index
{
    public function index()
    {
        //特色专区商品展示
        $goods = Paint::order('saled_num','desc')->limit('8')->select();
        return view('',compact('goods'));
    }
    //空方法
    public function _empty($name){
        return $name.'方法不存在！';
    }
}
