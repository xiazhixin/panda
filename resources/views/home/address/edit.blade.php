<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

	<title>修改收货人地址</title>

	<link href="{{asset('centerstyle/css/admin.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('centerstyle/css/amazeui.css')}}" rel="stylesheet" type="text/css">

	<link href="{{asset('centerstyle/css/personal.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('centerstyle/css/addstyle.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('centerstyle/js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('centerstyle/layer/layer.js')}}" type="text/javascript"></script>
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
							@if(session("user"))
								<p>你好,{{ session('user')->uname }}！<a href="{{url('/home/outlog')}}" target="_top" class="h">退出</a></p>
							@else
								<a href="{{url('/home/login/')}}" target="_top" class="h">亲，请登录</a>
								<a href="{{url('/home/register1')}}" target="_top">免费注册</a>
							@endif
						</div>
					</div>
				</ul>
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="{{url('/')}}" target="_top" class="h">商城首页</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="{{url('/home/center')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd"><a id="mc-menu-hd" href="{{url('home/docart')}}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
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
		<div class="nav-table">
			<div class="long-title"><span class="all-goods">全部分类</span></div>
			<div class="nav-cont">
				<ul>
					<li class="index"><a href="{{url('/')}}">首页</a></li>
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
		<b class="line"></b>
        
        
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr/>
                        
                        
                        </ul>
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">
					<div class="user-address">
						<div class="add-dress">
						<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
									@if (count($errors) > 0)
										<div class="alert alert-danger">
											<ul>
												@if(is_object($errors))
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												@else
													<li>{{ $errors }}</li>
												@endif
											</ul>
										</div>
									@endif
								<hr/>
                                @foreach($addr as $k=>$v)
								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form action="{{url('/home/address/update')}}/{{$v->id}}" method="post" class="am-form am-form-horizontal">
                                        {{ csrf_field() }}
										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人：</label>
											<div class="am-form-content">
												<input type="text" name="rec" value="{{$v->rec}}" id="user-name" placeholder="收货人">

											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码：</label>
											<div class="am-form-content">
												<input id="user-phone" name="tel" value="{{$v->tel}}" placeholder="手机号必填" type="text">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地：</label>
											<div class="am-form-content address">
												<input id="address" name="addr" value="{{$v->addr}}" placeholder="请输入详细地址" type="text">
											</div>
										</div>
										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<button type="submit" class="am-btn am-btn-danger">保存</button>
												<a href="javascript:;" onclick="history.go(-1)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
											</div>
										</div>
									</form>
								</div>
                                @endforeach
							</div>
                            </div>
						</div>

					</div>
                    <form action="" method="post" name="myform" style="display:none;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="hidden" name="_method" value="delete"/>
                    </form>
					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})

					</script>
                    @if (session('msg'))
                        <div class="alert alert-success">
                            <script type="text/javascript">
                            layer.alert('{{ session('msg') }}', {icon: 5});
                            </script>
                        </div>
                    @endif

					<div class="clear"></div>

				</div>
				<!--底部-->
				<div class="footer ">
                <div class="footer-hd ">
                    <p>
                        <a href="">PANDA商城</a>
                        <b>|</b>
                        <a href="{{url('/')}}">商城首页</a>
                        <b>|</b>
                        <a href="# ">支付宝</a>
                        <b>|</b>
                        <a href="# ">物流</a>
                    </p>
                </div>
                <div class="footer-bd ">
                    <p>
                        <a href="# ">关于PANDA</a>
                        <a href="# ">合作伙伴</a>
                        <a href="# ">联系我们</a>
                        <a href="# ">网站地图</a>
                        <em>© 2015-2025 Hengwang.com 版权所有*<a href="#" target="_blank" title="">PANDA商城</a> - Collect from <a href="#" title="" target="_blank">为你服务</a></em>
                    </p>
                </div>
            </div>
			</div>

			<aside class="menu">
				<ul>
					<li class="person active">
						<a href="{{url('home/center')}}">个人中心</a>
					</li>
					<li class="person">
						<a href="{{url('home/center/information')}}">个人资料</a>
						<ul>
							<li> <a href="{{url('home/center/information')}}">个人信息</a></li>
							<li> <a href="{{url('home/address')}}">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="{{url('/home/order')}}">订单管理</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="">我的资产</a>
						<ul>
							<li> <a href="">优惠券 </a></li>
							<li> <a href="">红包</a></li>
							<li> <a href="">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="">我的小窝</a>
						<ul>
							<li> <a href="">收藏</a></li>
							<li> <a href="">足迹</a></li>
							<li> <a href="">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>
	</body>


</html>

