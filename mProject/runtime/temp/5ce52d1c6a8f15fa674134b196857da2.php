<?php /*a:1:{s:76:"D:\php\code\mobileProject\mProject\application\home\view\login\register.html";i:1597232281;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>超市 </title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="icon" type="image/png" href="/theme/default//static/home/images/favicon.png">
		<link href="/static/home/css/amazeui.min.css" rel="stylesheet" type="text/css" />
		<link href="/static/home/css/style.css" rel="stylesheet" type="text/css" />
		<script src="/static/home/js/jquery-1.10.2.min.js"></script>
		<script src="/static/home/js/time.js"></script>
		<style>
			.yzm>img{
				margin-left: 30px;
				border-radius: 5px;
			}
			.validate{
				margin-left:20px;
			}
			div.validate-error{
				font-size:14px;
				color:red;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<header data-am-widget="header" class="am-header am-header-default sq-head ">
			<div class="am-header-left am-header-nav">
				<a href="javascript:history.back()" class="">
					<i class="am-icon-chevron-left"></i>
				</a>
			</div>
			<h1 class="am-header-title">
  	            <a href="" class="">注册</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	    <div class="login-logo">
	    	<img src="/static/home/images/logo.png" />
	    </div>
	    <div style="height: 3rem;"></div>

		<form action=""  id="form-register">
			<?php echo token(); ?>
	    <input type="text" name="username"  placeholder="请输入手机号/用户名" class="login-name">
			<div class="validate-error validate username"></div>
	    <input type="password" name="password"  placeholder="请输入密码" class="login-password">
			<div class="validate-error validate password"></div>
	    <input type="password" name="repwd"  placeholder="确认密码" class="login-repwd">
			<div class="validate-error validate repwd"></div>
			<div class="yzm" style="margin-top: 1.5rem;">
	    	<input type="text" name="captcha" class="reg-yzm" placeholder="输入验证码" />
<!--	    	<input type="button" class="yzm-hq" value="获取验证码" />-->
			<img src="<?php echo url('home/login/captcha'); ?>" onclick="this.src='<?php echo url('home/login/captcha'); ?>?id='+Math.random()" id="captcha-img" alt="">
			<div class="validate-error captcha"></div>

		</div>
	     <input type="button" class="login-btn"  value="立即注册">
	    <div class="agree">
	    	<input type="checkbox" name="checkbox" value="同意" >&nbsp;同意
		    <a href="" class="xy">《用户协议》</a>
		      <div class="r-login">已有账号，请<a href="<?php echo url('login'); ?>" class="l-login">登录</a></div>
	    </div>
		</form>
	   
	</body>
	<script src="/static/home/js/layer/layer.js" type="text/javascript"></script>
	<script>
		//注册
		$('.login-btn').click(function () {
			if($("input[type='checkbox']:checked").length>0){

				$.post('',$('#form-register').serialize(),function (data) {
					//更新csrf令牌
					$("input[name='__token__']").val(data.token);
					//清除错误信息
					$('.validate-error').empty();
					if(data.status==='ok'){
						layer.msg(data.msg,{icon:1,time:1000,shade:[0.5]},function () {
							location.href=data.url;
						})
					}else{
						layer.msg(data.msg,{icon:2,time:1500,shade:[0.5]},function () {
							//更新验证码
							$('#captcha-img').attr('src',"<?php echo url('home/login/captcha'); ?>?id="+Math.random() );

							for (var index in data.errors){
								$('.'+index).html(data.errors[index])
							}
						})
					}
				},'json');
			}else{
				layer.msg('请先同意用户协议',{icon:2,shade:[0.5],time:1500},function () {
					//更新验证码
					$('#captcha-img').attr('src',"<?php echo url('home/login/captcha'); ?>?id="+Math.random() );
				})
			}
		})
	</script>
</html>
