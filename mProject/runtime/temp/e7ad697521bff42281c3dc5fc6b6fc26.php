<?php /*a:1:{s:73:"D:\php\code\mobileProject\mProject\application\home\view\login\login.html";i:1597219614;}*/ ?>
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
			.geetest_holder{
				border-radius: 5px !important;
				margin-left: -12px;
				margin-top: -8px;
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
  	            <a href="" class="">登录</a>
            </h1>
	    </header>
		<form action="" id="login-form">
			<?php echo token(); ?>
	    <div style="height: 49px;"></div>
	   	<div class="login-logo">
	    	<img src="/static/home/images/logo.png" />
	    </div>
	    <div style="height: 3rem;"></div>
	    <input type="text" name="username" value="" id="mobile" placeholder="请输入手机号/用户名" class="login-name">
			<div class="validate-error validate username" ></div>
	    <input type="password" name="password" value="" id="password" placeholder="请输入密码" class="login-password">
			<div class="validate-error validate password"></div>

		<!--极验验证-->
		<div id="embed-captcha" class="login-verify">正在加载验证码.....</div>
	    <input type="button" class="login-btn"  value="我要登录">
		</form>
	    <div class="agree">
	    	<a href="<?php echo url('register'); ?>">免费注册</a>
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
	<script src="/static/home/js/layer/layer.js"></script>
	<script>
		var captcha_flag=false

		var handlerEmbed = function (captchaObj) {

			$("#embed-captcha").empty()
			captchaObj.appendTo("#embed-captcha");
			captchaObj.onSuccess(function () {
				captcha_flag=true;
			})
			$('.login-btn').click(function () {
				var validate = captchaObj.getValidate();
				if (!validate) {
					//失败
					layer.tips('请先验证！','#embed-captcha',{tips:[1,'#f00']})
					//阻止表单提交
					captcha_flag=false
				}else{
					//成功
					captcha_flag=true
				}
			})

		};
		//封装行为验证生成方法
		function captcha_init(){
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
		}
		captcha_init()

		//表单提交
		$('.login-btn').click(function () {
			//检查表单是否验证通过
			if(captcha_flag){
				//异步提交
				$.post("",$('#login-form').serialize(),function (data) {
					//更新csrf令牌
					$("input[name='__token__']").val(data.token);
					//清除错误信息
					$('.validate-error').empty();
					if(data.status==='ok'){
						layer.msg(data.msg,{icon:6,time:1000,shade:[0.5]},function () {
							location.href=data.url

						})
					}else{
						layer.msg(data.msg,{icon:5,time:1500,shade:[0.5]},function () {
							//重置行为验证
							captcha_init()
							//显示错误信息
							for (var index in data.errors){
								$('.'+index).html(data.errors[index])
							}
						})
					}
				},'json')
			}

		})
	</script>
</html>
