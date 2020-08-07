<?php /*a:1:{s:73:"D:\php\code\mobileProject\mProject\application\home\view\login\login.html";i:1596711438;}*/ ?>
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
			.geetest_radar_btn{
				border-radius: 5px !important;
				margin-left: -12px;
				margin-top: -8px;
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
  	            <a href="" class="">登录</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	    <!--<div class="login-logo">
	    	<img src="/static/home/images/logo.png" />
	    </div>-->
	    <div style="height: 3rem;"></div>
	    <input type="text" name="mobile" id="mobile" placeholder="请输入用户名/手机号" class="login-name">
	    <input type="password" name="password" id="password" placeholder="请输入密码" class="login-password">

		<!--极验验证-->
		<div id="embed-captcha" class="login-verify">正在加载验证码.....</div>
		<!--<p id="wait" class="show">正在加载验证码......</p>
		<p id="notice" class="hide">请先完成验证</p>-->

	    <input type="button" class="login-btn" value="我要登录">
	    <div class="agree">
	    	<a href="reg.html">免费注册</a>
	    	<a href="forgetpassword.html" class="forget">忘记密码？</a>
	    </div>
	    <div class="line"></div>
	    <div class="line-text">第三方账号登录</div>
	    <ul class="second-login">
	    	<li><a href=""><img src="/static/home/images/wxlogin.png"/></a></li>
	    	<li><a href=""><img src="/static/home/images/qqlogin.png"/></a></li>
	    	<li><a href=""><img src="/static/home/images/sinalog.png"/></a></li>
	    </ul>
	</body>
	<script src="/static/home/js/gt.js"></script>
	<script>
		var handlerEmbed = function (captchaObj) {
			/*$("#embed-submit").click(function (e) {
				var validate = captchaObj.getValidate();
				if (!validate) {
					$("#notice")[0].className = "show";
					setTimeout(function () {
						$("#notice")[0].className = "hide";
					}, 2000);
					e.preventDefault();
				}
			});*/
			// 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
			$("#embed-captcha").empty()
			captchaObj.appendTo("#embed-captcha");
			/*captchaObj.onReady(function () {
				$("#wait")[0].className = "hide";
			});*/
			// 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
		};
		$.ajax({
			// 获取id，challenge，success（是否启用failback）
			url: "<?php echo url('geeTestLib'); ?>?t=" + (new Date()).getTime(), // 加随机数防止缓存
			type: "get",
			dataType: "json",
			success: function (data) {
				console.log(data);
				// 使用initGeetest接口
				// 参数1：配置参数
				// 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
				initGeetest({
					gt: data.gt,
					challenge: data.challenge,
					new_captcha: data.new_captcha,
					product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
					offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
					// 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
				}, handlerEmbed);
			}
		});
	</script>
</html>
