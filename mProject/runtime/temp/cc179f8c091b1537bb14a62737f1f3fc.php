<?php /*a:2:{s:73:"D:\php\code\mobileProject\mProject\application\home\view\order\order.html";i:1596678427;s:68:"D:\php\code\mobileProject\mProject\application\home\view\parent.html";i:1596676150;}*/ ?>
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
        <link rel="icon" type="image/png" href="/theme/default/images/favicon.png">
		<link href="/static/home/css/amazeui.min.css" rel="stylesheet" type="text/css" />
		<link href="/static/home/css/style.css" rel="stylesheet" type="text/css" />
		<script src="/static/home/js/jquery-1.10.2.min.js"></script>
		<script src="/static/home/js/date.js"></script>
		<script src="/static/home/js/iscroll.js"></script>
		<script type="text/javascript">
			$(function(){
				$('#beginTime').date();
				$('#endTime').date({theme:"datetime"});
			});
        </script>
	</head>

<body>

		<header data-am-widget="header" class="am-header am-header-default sq-head ">
			<div class="am-header-left am-header-nav">
				<a href="javascript:history.back()" class="">
					<i class="am-icon-chevron-left"></i>
				</a>
			</div>
			<h1 class="am-header-title">
  	            <a href="" class="">确认订单</a>
            </h1>
	    </header>
	    <div style="height: 49px;"></div>
	    <h5 class="order-tit">收货人信息</h5>
	    <div class="order-name">
	    	<a href="gladdress.html">
	    		<p class="order-tele">宋科&nbsp;&nbsp;&nbsp;15180163170</p>
	    		<p class="order-add">江西省南昌市 青云谱区解放西路258号</p>
	    	</a>
	    	<i class="am-icon-angle-right"></i>
	    </div>
        <div style="background: #eee; height: 10px;"></div>
        <h5 class="order-tit">确认订单信息</h5>
        <ul class="shopcart-list" style="padding-bottom: 0; margin-top: 0;">
	    	<li>
                <img src="/static/home/images/test3.png" class="shop-pic" />
                <div class="order-mid">
                	<div class="tit">法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮</div>
                	<div class="order-price">￥169 <i>X2</i></div>
                </div>
	    	</li>
	    	<li>
                <img src="/static/home/images/test3.png" class="shop-pic" />
                <div class="order-mid">
                	<div class="tit">法国加力果12个装 进口新鲜水果 嘎啦苹果 包邮</div>
                	<div class="order-price">￥169 <i>X2</i></div>
                </div>
	    	</li>
	    </ul>
	    <ul class="order-infor">
	    	<li class="order-infor-first">
	    		<span>商品总计：</span>
	    		<i>￥88.00</i>
	    	</li>
	    	<li class="order-infor-first">
	    		<span>运费：</span>
	    		<i>包邮</i>
	    	</li>
	    	<li class="order-infor-first">
	    		<a href="integral.html">积分抵费></a>
	    	</li>
	    	<li class="order-infor-first">
	    		<a href="yhq.html">选择优惠券></a>
	    	</li>
	    </ul>
	    <!--<div style="background: #eee; height: 10px;"></div>
	    
	    <input id="beginTime" class="select-time" placeholder="请选择配送时间 >" /></div>
		<div id="datePlugin"></div>-->
	    <div style="background: #eee; height: 10px;"></div>
	    <textarea placeholder="备注说明" class="bz-infor"></textarea>
	    <div style="background: #eee; height: 10px;"></div>
	    <div style="height: 55px;"></div>
	    <div class="shop-fix">
	    	<div class="order-text">
	    		应付总额：<span>￥188</span>
	    	</div>
	    	<a href="pay.html" class="js-btn">提交订单</a>
	    </div>

<!--底部-->
<div style="height: 55px;"></div>
<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default sq-foot am-no-layout" id="">
 <ul class="am-navbar-nav am-cf am-avg-sm-5">
  <li>
   <a href="index.html" class="curr">
    <span class="am-icon-home"></span>
    <span class="am-navbar-label">首页</span>
   </a>
  </li>
  <li>
   <a href="message.html" class="">
    <span class="am-icon-comments"></span>
    <span class="am-navbar-label">动态</span>
   </a>
  </li>
  <li>
   <a href="shopcart.html" class="">
    <span class="am-icon-shopping-cart"></span>
    <span class="am-navbar-label">购物车</span>
   </a>
  </li>
  <li>
   <a href="allorder.html" class="">
    <span class="am-icon-file-text"></span>
    <span class="am-navbar-label">订单</span>
   </a>
  </li>

  <li>
   <a href="member.html" class="">
    <span class="am-icon-user"></span>
    <span class="am-navbar-label">我的</span>
   </a>
  </li>
 </ul>
</div>
 
 


</body>
</html>
