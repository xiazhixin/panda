@extends('layouts.center)
@section('title','修改收件人地址')
@section('content')
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
                                        @foreach ($errors->all() as $error)
                                            <li style="color:red;font-size:15px;margin-left:12px;">{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
								<hr/>
                                @foreach($addr as $vo)
								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form action="{{url('/home/address/update')}}/{{$vo->id}}" method="post" class="am-form am-form-horizontal">
                                        {{ csrf_field() }}
										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人：</label>
											<div class="am-form-content">
												<input type="text" name="name" value="{{$vo->name}}" id="user-name" placeholder="收货人">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码：</label>
											<div class="am-form-content">
												<input id="user-phone" name="phone" value="{{$vo->phone}}" placeholder="手机号必填" type="text">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地：</label>
											<div class="am-form-content address">
												<input id="address" name="address" value="{{$vo->address}}" placeholder="请输入详细地址" type="text">
											</div>
										</div>
										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<button type="submit" class="am-btn am-btn-danger">保存</button>
												<a href="{{url('/home/address')}}" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
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
                    @if (session('err'))
                        <div class="alert alert-success">
                            <script type="text/javascript">
                            layer.alert('{{ session('err') }}', {icon: 5});
                            </script>
                        </div>
                    @endif

					<div class="clear"></div>

				</div>
				<!--底部-->
				<div class="footer ">
                <div class="footer-hd ">
                    <p>
                        <a href="">CLC商城</a>
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
                        <a href="# ">关于CLC</a>
                        <a href="# ">合作伙伴</a>
                        <a href="# ">联系我们</a>
                        <a href="# ">网站地图</a>
                        <em>© 2015-2025 Hengwang.com 版权所有*<a href="#" target="_blank" title="">CLC商城</a> - Collect from <a href="#" title="" target="_blank">为你服务</a></em>
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

	@endsection