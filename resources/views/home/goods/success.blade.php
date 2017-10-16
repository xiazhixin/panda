<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>商品页面</title>

		<link href="{{asset('home/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('home/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('home/basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
		<link type="text/css" href="{{asset('home/css/optstyle.css')}}" rel="stylesheet" />
		<link type="text/css" href="{{asset('home/css/style.css')}}" rel="stylesheet" />

		<script type="text/javascript" src="{{asset('home/basic/js/jquery-1.7.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('home/basic/js/quick_links.js')}}"></script>

		<script type="text/javascript" src="{{asset('home/AmazeUI-2.4.2/assets/js/amazeui.js')}}"></script>
		<script type="text/javascript" src="{{asset('home/js/jquery.imagezoom.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('home/js/jquery.flexslider.js')}}"></script>
		<script type="text/javascript" src="{{asset('home/js/list.js')}}"></script>
    <link href="{{asset('home/css/fenye.css')}}" rel="stylesheet">

	</head>

	<body>


		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				<div class="topMessage">
					<div class="menu-hd">
						<a href="#" target="_top" class="h">亲，请登录</a>
						<a href="#" target="_top">免费注册</a>
					</div>
				</div>
			</ul>
			<ul class="message-r">
				<div class="topMessage home">
					<div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
				</div>
				<div class="topMessage my-shangcheng">
					<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
				</div>
				<div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="../images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="../images/logobig.png" /></li>
				</div>
				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>
            <b class="line"></b>
			<div class="listMain">

				<!--分类-->
			<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
				<ol class="am-breadcrumb am-breadcrumb-slash">
					<li><a href="#">首页</a></li>
					<li><a href="#">分类</a></li>
					<li class="am-active">内容</li>
				</ol>
				<script type="text/javascript">
					$(function() {});
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script>
				<div class="scoll">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<img src="../images/01.jpg" title="pic" />
								</li>
								<li>
									<img src="../images/02.jpg" />
								</li>
								<li>
									<img src="../images/03.jpg" />
								</li>
							</ul>
						</div>
					</section>
				</div>

				<!--放大镜-->
				<div class="w main">
	<!-- /widget/addtocart-hk/addtocart-hk.tpl -->
	<!-- result start -->

		<style type="text/css">
             body{
			 margin:0px;padding:0px;
			
			 }
			 ul{list-style:none;margin:0px;padding:0px;}


             /* 顶 部 */
			 #top{background:#F1F1F1;}
			 #top_content{width:1210px;margin:0px auto;font-size:14px;line-height:30px;}
			 #top_cl{height:30px;width:210px;float:left;padding-left:10px;}
			 #top_cr{height:30px;width:830px;float:right;margin-right:-30px;}
			 #top_cr li{float:left;margin:0px  0px  0px  27px;}

             /* 头 部  */
			 #header{width:1210px;margin:0px auto;opacity:1;background-color:white;height:100px;position:relative;}
			 #logo{width:270px;display:block;float:left;margin-top:19px;}
             #h_in{height:26px;width:450px;position:absolute;left:364px;top:26px;border:2px solid #b1191a;}
             #h_btn{height:32px;width:80px;position:absolute;left:818px;top:26px;border:2px solid #b1191a;background-color:#b1191a;color:white;}
             #hot_word{position:absolute;left:362px;top:67px;font-size:12px;}
             #hot_word>span{margin-right:5px;}
             #hot_word>span:hover{color:red;}
             #h_cart{width:140px;height:36px;float:right;margin-top:24px;margin-right:66px;text-decoration:none;line-height:36px;font-size:13px;color:black;}
             #h_cart:hover{color:red;}
             #h_cart>i{margin-left:25px;display:inline-block;width:18px;height:15px;background:url('./public/images/bg_lt.png') 0px 103px;}




			 #nav{width:1210px;margin:0px auto;height:43px;line-height:43px;}

			 /* 主 要 菜 单 */
			 #menu>li{width:210px;height:43px;background-color:#B1191A;color:white;text-indent:11px;float:left;position:relative;}
			 #menu>li>ul{padding-top:2px;}
			 #menu>li .m1{width:210px;height:31px;background-color:#C81623;color:white;font-size:13px;font-weight:bold;line-height:31px;}
			 #menu>li .m1 a{color:white;text-decoration:none;}
			 #menu>li .m1:hover{background-color:white;color:red;border-left:1px solid #c81623;}
			 #menu>li .m1:hover>a{color:red;}
			

             /* 二 级 菜 单 */
             .m2{width:1000px;height:470px;position:absolute;left:210px;top:45px;display:none;background-color:white;border:1px solid #c81623;border-width:0px 1px 1px 0px;}
             .m1:hover .m2{display:block;}
             .sm_l{width:812px;float:left;height:470px;}
             .sm_r{width:168px;float:right;margin-right:20px;}
             .sm_r>img{display:block;margin:15px 0px;}

             .sml_1{height:30px;width:800px;padding-left:10px;margin-top:19px;}
             .sml_1>a{display:inline-block;height:26px;background-color:#7C7171;text-decoration:none;margin-right:5px;color:white;font-weight:bold;}
             .sml_1>a>i{display:inline-block;height:26px;width:20px;background-color:#5C5251;margin-left:6px;text-indent:5px;}

             .sml_2{height:400px;width:800px;background-color:white;opacity:1;padding-left:10px;}
             .sml_2>a{float:left;text-decoration:none;line-height:50px;background-color:pink;margin:10px;padding:0px 30px;text-indent:0px;border-radius:2px;}

             /* 横向导航菜单 */
			 #menu_right>li{margin:0px 20px;float:left;color:#7B7B7B;}
			 #menu_right>li:hover{color:red;}
			 #mr_1 li{margin-bottom:9px}
			 #mr_1 li:hover{color:red;}
			 #mr_1>#notice{font-size:13px;text-indent:12px;padding-top:1px;}

             /* 一 条 红 线 */
			 #line{border-top:2px solid #B1191A;}

             /* 主 体 */
			 #mainbody{width:1210px;margin:0px auto;height:470px;}
			 #main_m{width:730px;background-color:pink;height:454px;float:left;margin-left:220px;margin-top:12px;}
			 #main_r{width:250px;height:454px;float:right;margin-top:12px;}
			 #mr_1{width:248px;height:165px;border:1px solid #E4E4E4;}
			 #mr_1>h3{float:left;margin-top:8px;font-size:16px;text-indent:16px;}
			 #mr_1>span{float:right;margin-top:10px;font-size:10px;margin-right:17px;}
			 #mr_2{width:250px;height:289px;}

             /* 今 日 推 荐 */
			 #today{margin:6px auto;width:1210px;}
			 #today img{float:left;}
             
            

             /* 底 部 */
             #bottom{height:100px;background-color:#F5F5F5;}
             #b_m{margin:0px auto;width:1210px;}
             #b_m>img{float:left;margin-left:10px;margin-top:20px;margin-right:72px;}
             #footer{margin:0px auto;width:1210px;height:300px;}
             #footer dl{float:left;margin-right:120px;}
             #footer dt{height:30px;}
             #footer dd{font-size:12px;margin-left:0px;line-height:20px;}

             
            /* 商 品 列 表 */
             #glist{margin:0px auto;width:1210px;margin-top:10px;}
             #gl{width:208px;float:left;box-shadow:0px 0px 1px 1px #e9e9e9;}
             #gr{width:1000px;float:right;}
             #gr_1{width:980px;padding:7px 0px 13px 10px;height:18px;background-color:#F1F1F1;}
             #gr_1>span{float:left;background-color:white;border:1px solid #ccc;font-size:12px;padding:4px 9px;}
             #gr_2{width:980px;padding:7px 0px 13px 10px;height:18px;background-color:#F9F9F9;}

             #gr_3>li{width:240px;height:436px;background-color:white;opacity:1;margin-top:10px;margin-left:9px;float:left;}
             #gr_3>li:hover{box-shadow:0px 0px 1px 1px #E9E9E9;}
             #gr_3 img{width:220px;height:220px;margin:45px auto 0px auto;display:block;}

             .p-price{font-size:20px;font-weight:bold;color:#E4393C;margin-top:15px;}
             .p-name{font-size:14px;font-weight:normal;color:#666666;margin-top:10px;white-space:nowrap;overflow:hidden;}
             .p-special{font-size:12px;font-weight:bold;color:#666666;margin-top:10px;white-space:nowrap;overflow:hidden;}
             .p-pl{font-size:12px;font-weight:bold;color:#666666;margin-top:10px;white-space:nowrap;overflow:hidden;}
             .p-btn{text-align:center;}
             .p-btn>span{display:inline-block;padding:7px 10px;border:1px solid #DDDDDD;font-size:12px;font-weight:normal;color:#999999;margin-top:10px;white-space:nowrap;overflow:hidden;}

             /* 推 广 */
             .tg-img{display:block;margin:0px auto;}
             .tg-name{font-size:14px;word-spacing:1px;line-height:20px;padding:0px 10px;margin-top:10px;height:40px;overflow:hidden;}
             .tg-price{font-size:18px;color:#E4393C;font-weight:bold;text-indent:10px;margin-top:5px;}
             .tg-pj{font-size:13px;color:#999999;text-indent:10px;margin-top:5px;margin-bottom:30px;}

         
            /* 商 品 详 情 */   
         #detail{background:url('./public/detail.png1');}
         
         #p-path{height:44px;width:1210px;background-color:#F2F2F2;margin:0px auto;}
         #p-cont{width:1210px;margin:0px auto;}
         #p-l{width:378px;height:489px;float:left;}
         #p-img{width:350px;height:350px;display:block;margin:14px auto 0px auto;}
         #p-lt{width:290px;margin:15px auto 0px auto;}
         .p-ltimg{width:50px;height:50px;display:inline-block;}
         .p-ltimg:hover{box-shadow:0px 0px 0px 2px #E4393C;}
         #p-btm1{font-size:13px;margin-left:33px;display:inline-block;}
         #p-btm2{font-size:13px;margin-left:85px;margin-top:27px;display:inline-block;}
         #p-btm2>i{width:12px;height:12px;display:inline-block;background:url('./public/images/newicon.png') no-repeat -161px -296px;}
         #p-btm3{font-size:13px;margin-left:8px;}
         #p-btm3>i{width:14px;height:14px;display:inline-block;background:url('./public/images/newicon.png') no-repeat -177px -296px;}
         #p-m{width:588px;background-color:white;opacity:1;float:left;position:relative;}
         #p-m-1{width:510px;height:110px;display:inline-block;}
     	#p-name{font-size:20px;font-weight:700;height:48px;overflow:hidden;color:#666666;margin:20px 0px 10px 0px;}
     	#p-desc{font-size:14px;height:40px;overflow:hidden;}
         #p-m-2{position:absolute;right:10px;top:33px;background-color:#F5F5F5;padding:5px 15px;border:1px solid #ddd;color:#323232;font-size:12px;}
         #p-m-3{width:586px;height:118px;background-color:#F7F7F7;position:relative;}
        #p-m-3-1{font-size:12px;margin-left:20px;line-height:50px;margin-top:15px;margin-bottom:-10px;}
        #p-m-3-1>span{font-size:20px;color:#e4393c;font-weight:bold;line-height:35px;}
        #p-m-3-2{font-size:12px;margin-left:20px;line-height:20px;}
        #p-m-3-2>span{background-color:#E4393C;color:white;}
        #p-m-3-2>em{color:#E4393C;font-style:normal;}
        #p-m-3-2>i{vertical-align:middle;display:inline-block;width:19px;height:22px;background:url('./public/images/mbuy.png');}
        #p-m-3-2>i:hover{background:url('./public/images/mbuy.png') 0px -22px;}
        #p-m-3-2>b{color:#005AA0;}
        #p-m-3-3{font-size:12px;margin-left:20px;line-height:20px;color:#e4393c;text-indent:59px;}
        #p-m-3-3>span{background-color:#e4393c;color:white;}
        #p-m-3-f{position:absolute;right:18px;top:10px;width:60px;height:100px;color:#999999;font-size:12px;line-height:20px;}
        #p-m-3-f b{color:#005EB8;font-size:14px;padding-left:10px;}
        #p-m-3-f>span{padding-left:10px;border-left:1px solid #E6E6E6;display:inline-block;width:69px;height:33px;margin-bottom:8px;}

         #p-m-4{width:586px;height:50px;font-size:12px;line-height:50px;text-indent:20px;color:#666666;border-bottom:1px dotted #ddd;}

         #p-m-5{font-size:12px;line-height:30px;text-indent:20px;vertical-align:middle;margin-top:20px;}
         #p-m-5>span{display:inline-block;border:1px solid #ddd;margin-left:10px;text-indent:5px;height:30px;padding-right:8px;}
         #p-m-5>span>img{vertical-align:middle;margin-right:4px;}
         #p-m-5>span>b{display:inline-block;}

         #p-m-6{font-size:12px;line-height:30px;text-indent:20px;vertical-align:middle;margin-top:20px;}
         #p-m-6>span{display:inline-block;border:1px solid #ddd;margin-left:10px;text-indent:5px;height:30px;padding-right:8px;}
        
         #p-m-7{font-size:12px;line-height:30px;text-indent:20px;vertical-align:middle;margin-top:20px;}
         #p-m-7>span{display:inline-block;border:1px solid #ddd;margin-left:10px;text-indent:5px;height:30px;padding-right:8px;}

         #p-m-8-1{width:56px;height:36px;border:1px solid #999;margin-left:20px;margin-top:20px;display:inline-block;}
         #p-cnt{width:35px;height:31px;text-align:center;float:left;}
         #pn-add{width:17px;height:18px;border:0px;float:right;}
         #pn-dec{width:17px;height:18px;border:0px;float:right;}
         
         #p-m-8 #pcart{display:inline-block;width:135px;height:36px;background:url('./public/images/p-btns.png') no-repeat 0px 0px;border-radius:3px;}

         #p-r{width:200px;height:290px;float:right;}
         
         
         /*加入购物车后提示*/
         #precart-p{height:195px;background-color:#F5F5F5}
         #precart-c{height:195px;width:1210px;margin:0px auto;background-color:pink1;}
         #pre-l{float:left;width:500px;height:145px;}
            #pre-l>p{font-size:18px;color:#9AB24C;text-indent:20px;font-family:'微软雅黑';}
            #pre-l>img{display:inline-block;width:90px;height:90px;vertical-align:top;margin:0px 10px;}
            #pre-l>div{display:inline-block;width:380px;line-h}
            #pre-l>div>span:nth-child(1){font-size:14px;float:left;margin-bottom:10px;}
            #pre-l>div>span:nth-child(2){font-size:12px;float:left;color:#AAAAAA;}
         #pre-r{float:right;width:400px;height:195px;}
         #pre-r>a{float:left;margin-top:130px;line-height:36px;text-align:center;height:36px;display:inline-block;text-decoration:none;}
         #pre-r>a:nth-child(1){ margin-left:100px;margin-right:15px;width:95px;background-color:white;color:red;}
         #pre-r>a:nth-child(1):hover{box-shadow:0px 0px 0px 1px red;}
         #pre-r>a:nth-child(2){width:170px;background-color:#C91623;color:white;font-weight:bold;}
         
         
            /*隐藏菜单*/
            #dropdown{display:none;}
            #menu>li:hover #dropdown{display:block;}
		</style>
	</head>
<div id='precart-p'>
    <div id='precart-c'>
        <div id='pre-l'>
            <p>商品已成功加入购物车！</p>
            <img src='{{asset($good[0]->gpic)}}'><div>
                <span>{{$good[0]->gname}}</span><br>
                <span>/ 数量:{{$num}}</span>
            </div>
        </div>
        <div id='pre-r'>
            <a href="{{url('home/index')}}">继续购物</a>
            <a href="{{url('home/docart')}}" >去购物车结算</a>
        </div>
    </div>
</div>
<div style='clear:both;'></div>

	
			<!--菜单 -->
			<div class=tip>
				<div id="sidebar">
					<div id="wrap">
						<div id="prof" class="item">
							<a href="#">
								<span class="setting"></span>
							</a>
							<div class="ibar_login_box status_login">
								<div class="avatar_box">
									<p class="avatar_imgbox"><img src="../images/no-img_mid_.jpg" /></p>
									<ul class="user_info">
										<li>用户名：sl1903</li>
										<li>级&nbsp;别：普通会员</li>
									</ul>
								</div>
								<div class="login_btnbox">
									<a href="#" class="login_order">我的订单</a>
									<a href="#" class="login_favorite">我的收藏</a>
								</div>
								<i class="icon_arrow_white"></i>
							</div>

						</div>
						<div id="shopCart" class="item">
							<a href="#">
								<span class="message"></span>
							</a>
							<p>
								购物车
							</p>
							<p class="cart_num">0</p>
						</div>
						<div id="asset" class="item">
							<a href="#">
								<span class="view"></span>
							</a>
							<div class="mp_tooltip">
								我的资产
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="foot" class="item">
							<a href="#">
								<span class="zuji"></span>
							</a>
							<div class="mp_tooltip">
								我的足迹
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="brand" class="item">
							<a href="#">
								<span class="wdsc"><img src="../images/wdsc.png" /></span>
							</a>
							<div class="mp_tooltip">
								我的收藏
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="broadcast" class="item">
							<a href="#">
								<span class="chongzhi"><img src="../images/chongzhi.png" /></span>
							</a>
							<div class="mp_tooltip">
								我要充值
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div class="quick_toggle">
							<li class="qtitem">
								<a href="#"><span class="kfzx"></span></a>
								<div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>
							</li>
							<!--二维码 -->
							<li class="qtitem">
								<a href="#none"><span class="mpbtn_qrcode"></span></a>
								<div class="mp_qrcode" style="display:none;"><img src="../images/weixin_code_145.png" /><i class="icon_arrow_white"></i></div>
							</li>
							<li class="qtitem">
								<a href="#top" class="return_top"><span class="top"></span></a>
							</li>
						</div>

						<!--回到顶部 -->
						<div id="quick_links_pop" class="quick_links_pop hide"></div>

					</div>

				</div>
				<div id="prof-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						我
					</div>
				</div>
				<div id="shopCart-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						购物车
					</div>
				</div>
				<div id="asset-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						资产
					</div>

					<div class="ia-head-list">
						<a href="#" target="_blank" class="pl">
							<div class="num">0</div>
							<div class="text">优惠券</div>
						</a>
						<a href="#" target="_blank" class="pl">
							<div class="num">0</div>
							<div class="text">红包</div>
						</a>
						<a href="#" target="_blank" class="pl money">
							<div class="num">￥0</div>
							<div class="text">余额</div>
						</a>
					</div>

				</div>
				<div id="foot-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						足迹
					</div>
				</div>
				<div id="brand-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						收藏
					</div>
				</div>
				<div id="broadcast-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						充值
					</div>
				</div>
			</div>
		<script>
			function bcnt(id){
				//获取购买数量
				var bcnt = $('#text_box').val();
				alert(bcnt);
				//发送ajax
				$.get("{{url('home/cart/')}}"+'/'+id,{'bcnt':bcnt},function(data){
	            
	          	})
			}
		</script>
	</body>

</html>