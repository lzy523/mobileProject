<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/*Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

return [

];*/
//首页
Route::any('/','home/index/index')->name('/');//首页
Route::any('login','home/login/login')->name('login');//登录
Route::any('geetestLib','home/login/geetestLib')->name('geetestLib');//极验验证
Route::any('register','home/login/register')->name('register');//注册

//动态
Route::get('message','home/message/message')->name('message');//动态

//购物车
Route::get('cart','home/cart/shopcart')->name('cart');//购物车

//订单
Route::get('order','home/order/order')->name('order');//订单

//我的
Route::get('member','home/member/member')->name('member');//我的