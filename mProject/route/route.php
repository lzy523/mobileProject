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
Route::any('/','home/index/index');//首页
Route::any('login','home/login/login');//登录
Route::any('register','home/login/register');//注册

//动态
Route::get('message','home/message/message');//动态

//购物车
Route::get('cart','home/cart/shopcart');//购物车

//订单
Route::get('order','home/order/order');//订单

//我的
Route::get('member','home/member/member');//我的

//账户余额
Route::get('records','home/member/records')->name('records');//账户余额

//积分
Route::get('integral','home/member/integral')->name('integral');//积分

//收藏
Route::get('collect','home/member/collect')->name('collect');//收藏

//优惠券
Route::get('yhq','home/member/yhq')->name('yhq');//优惠券

//充值
Route::get('recharge','home/member/recharge')->name('recharge');//充值

//商品详情
Route::get('goodsDetail/:id','home/goods/goodsDetail')->name('goodsDetail');//商品详情