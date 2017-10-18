<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

	<title>>@yield('title')</title>

	<link href="{{asset('centerstyle/css/admin.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('centerstyle/css/amazeui.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('centerstyle/css/personal.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('centerstyle/css/systyle.css')}}" rel="stylesheet" type="text/css">

	<script src="{{asset('centerstyle/js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('centerstyle/layer/layer.js')}}" type="text/javascript"></script>
	<script src="{{asset('centerstyle/js/jquery.min.js')}}"></script>
	<script src="{{asset('centerstyle/js/amazeui.js')}}"></script>
	<link rel="icon" href="{{asset('centerstyle/images/favicon.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" href="{{asset('centerstyle/images/favicon.ico') }}" type="image/x-icon">
</head>

<body>
<!--头 -->
<header>
	<article>
		<div class="mt-logo">
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
							@if(session('user'))
								<a href="#" target="_top" class="h" style="color:blue">你好,{{session('user')->uname}}</a>
								<a href="{{asset('/home/outlog')}}outlog" target="_top" style="color:blue">退出登录</a>
							@else
								<a href="{{url('home/login')}}" target="_top" class="h" >亲，请登录</a>
								<a href="{{url('home/register1')}}" target="_top">免费注册</a>
							@endif
						</div>
					</div>
				</ul>
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="{{url('/home/index/')}}" target="_top" class="h">商城首页</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="{{url('home/center')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd"><a id="mc-menu-hd" href="" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logoBig">
					<li><img style="width:200px;height:90px;" src="{{asset('home/images/logop.jpg') }}" /></li>
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
		</div>
		</div>
	</article>
</header>
@section('content')

@show
</body>

</html>