<?php

namespace app\home\controller;

use app\common\model\User;
use app\home\validate\Home;
use think\captcha\Captcha;
use think\Controller;
use think\facade\Session;
use think\Request;

class Login extends Controller
{
    //登录
    public function login(){
        if(request() -> isPOST()) {
            //表单验证
            //实例化验证器对象
            $validate=new Home();
            if($validate->batch()->scene('login')->check(input('param.'))){
                //验证通过
                //验证验证码是否正确
                $geetestChallenge = input('param.geetest_challenge');
                $geetestValidate = input('param.geetest_validate');
                $geetestSeccode = input('param.geetest_seccode');
                if ($this->checkGt($geetestChallenge, $geetestValidate, $geetestSeccode)) {

                    //接收字段username（可以是 用户名或者手机号）
                    $username = trim(input('param.username'));
                    $password = md5(input('param.password'));

                    $user = User::whereRaw('mobile=? or username=?',[$username,$username])
                        ->where('password', $password)
                        ->find();
                    if ($user) {
                        //将用户信息写入session
                        session('user_id',$user->id);
                        session('user_mobile',$user->mobile);
                        session('user_name',$user->username);
                        session('user_avatar',$user->avatar);

                        return json(['status' => 'ok', 'msg' => '登录成功', 'url' => url('/')]);
                    } else {
                        return json(['status' => 'error', 'msg' => '用户名或密码不正确']);
                    }
                } else {
                    return json(['status' => 'error', 'msg' => '请先完成极验验证']);
                }
            }else{
                //验证不通过，返回错误信息
                //返回表单，数据要保持
                return json(['status'=>'error', 'msg' => '请先完成表单验证','errors'=>$validate->getError(),'token'=>request()->token()]);

            }
        }else{

            return view();
        }
    }
    //极验验证
    //生成行为验证码
    public function geetestLib(){
        $GtSdk = new \GeetestLib(config('app.verity.appid'), config('app.verity.appkey'));

        $data = array(
            "user_id" => "test", # 网站用户id随便选
            "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
            "ip_address" => "127.0.0.1" # 请在此处传输用户请求验证时所携带的IP
        );

        $status = $GtSdk->pre_process($data, 1);
        session('gtserver',$status) ;
        session('user_id',$data['user_id']) ;
        echo $GtSdk->get_response_str();
    }
    //验证行为验证码
    public function checkGt($geetestChallenge,$geetestValidate,$geetestSeccode){
        $GtSdk = new \GeetestLib(config('app.verity.appid'), config('app.verity.appkey'));

        $data = array(
            "user_id" => session('user_id'), # 网站用户id
            "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
            "ip_address" => "127.0.0.1" # 请在此处传输用户请求验证时所携带的IP
        );
        if (session('gtserver') == 1) {   //服务器正常
            $result = $GtSdk->success_validate($geetestChallenge, $geetestValidate, $geetestSeccode, $data);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {  //服务器宕机,走failback模式
            if ($GtSdk->fail_validate($geetestChallenge, $geetestValidate, $geetestSeccode)) {
                return true;
            } else {
                return false;
            }
        }

    }

    //退出
    public function logout(){
        Session::delete('user_id');
        Session::delete('user_mobile');
        Session::delete('user_name');
        Session::delete('user_avatar');

        return  json(['status'=>'ok','msg'=>'See you......']);
    }

    //注册
    public function register(){
        if(request()->isPOST()){
            //实例化验证器对象
            $validate = new Home();
            if($validate -> batch() -> scene('register') -> check( input('param.') ) ){
                //验证通过

                //接收字段username（可以是 用户名或者手机号）
                $data['username'] = trim(input('param.username'));
                $data['password'] = md5(input('param.password'));
                $data['add_time'] = time();
                $userId=User::insertGetId($data);
                if($userId){
                    $user=User::field('mobile,username,avatar')->where('id',$userId)->find();
                    //将用户信息写入session
                    session('user_id',$userId);
                    session('user_mobile',$user->mobile);
                    session('user_name',$user->username);
                    session('user_avatar',$user->avatar);

                    return json(['status'=>'ok','msg'=>'注册成功','url'=>url('/')]);
                }else{
                    return json(['status' => 'error', 'msg' => '用户已存在']);
                }
            }else{
                //验证不通过，返回错误信息
                return json(['status'=>'error','msg' => '请先完成验证','errors'=>$validate->getError(),'errors'=>$validate->getError(),'token'=>request()->token()]);

            }
        }
        return view();
    }

    public function captcha(){
        //配置项
        $config = [
            'codeSet' => '0123456789', //字符集
            'fontSize' => mt_rand(18,25), //字体大小
            'useCurve' => false, //混淆曲线
            'useNoise' => false, //干扰杂项
            'imageH' => 41, //高
            'imageW' => 120,//宽
            'length' => 3, //字符数量
            'bg' => [mt_rand(180,255),mt_rand(180,255),mt_rand(180,255)], //颜色背景
            'useImgBg' => false, //图片背景

        ];

        //实例化验证码类
        $captcha = new Captcha($config);
        //生成验证码
        return $captcha->entry();
    }

    //空方法
    public function _empty($name){
        return $name.'方法不存在！';
    }

}
