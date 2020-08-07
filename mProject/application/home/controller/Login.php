<?php

namespace app\home\controller;

use think\Controller;
use think\Request;

class Login extends Controller
{
    //登录
    public function login(){
        return view();
    }
    //极验验证
    public function geetestLib(){
        $GtSdk = new \GeetestLib(config('app.verity.appid'), config('app.verity.appkey'));
        //session_start();

        $data = array(
            "user_id" => "test", # 网站用户id随便选
            "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
            "ip_address" => "127.0.0.1" # 请在此处传输用户请求验证时所携带的IP
        );

        $status = $GtSdk->pre_process($data, 1);
        $_SESSION['gtserver'] = $status;
        $_SESSION['user_id'] = $data['user_id'];
        echo $GtSdk->get_response_str();
    }

    //注册
    public function register(){
        return view();
    }
}
