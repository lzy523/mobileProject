<?php

namespace app\home\controller;

use app\common\model\Collect;
use app\common\model\Paint;
use app\common\model\User;
use think\Controller;
use think\Request;

class Member extends Controller
{
    //个人中心
    public function member(){
        return view();
    }

    //账户余额
    public function records(){

        session('user_id','1');
        $money = User::where('id',session('user_id'))->value('money');

        return view('',compact('money'));
    }

    //积分
    public function integral(){
        $score = User::where('id',session('user_id'))->value('score');

        return view('',compact('score'));
    }

    //收藏
    public function collect(){
        $paint_id = Collect::where('user_id',session('user_id'))
                  -> where('active',1) -> column('paint_id');
        if (count($paint_id)>0){
            for ($i=0;$i<count($paint_id);$i++){
                $arr = Paint::where('id',$paint_id[$i])->find()->toArray();
                $collect[]=$arr;
            }
        }else{
            $collect = 0;
        }
        return view('',compact('collect'));
    }

    //优惠券
    public function yhq(){
        return view();
    }

    //充值
    public function recharge(){


        $money = User::where('id',session('user_id'))->value('money');
        return view('',compact('money'));
    }
}
