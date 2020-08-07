<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//公共dd（）方法
function dd($var){
    echo '<pre>';
    if(is_array($var)){

        print_r($var);
    }else{

        var_dump($var);
    }
    echo '</pre>';
    exit();
}

// 文件上传
function upload($image,$size=1048576,$ext='jpg,jpeg,gif,png'){

    //上传配置
    $config = ['size'=>$size,'ext'=>$ext];
    //上传
    $info = $image -> validate($config) -> move( config('app.upload') );

    if($info){
        return ['status'=>'ok','img_dir'=>$info->getPath(),'img_name'=>$info->getFilename()];
    }else{
        return ['status'=>'error','msg'=>$image->getError()];
    }
}
