<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>订单管理</title>

		<link href="{{asset('home/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('home/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">

		<link href="{{asset('home/css/personal.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('home/css/orstyle.css')}}" rel="stylesheet" type="text/css">

		<script src="{{asset('home/AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('home/AmazeUI-2.4.2/assets/js/amazeui.js')}}"></script>
		<script src="{{asset('home/layer/layer.js')}}"></script>

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
					</div>
				</div>
			</article>
		</header>
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
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								<li><a href="#tab2">待付款</a></li>
								<li><a href="#tab3">待发货</a></li>
								<li><a href="#tab4">待收货</a></li>
								<li><a href="#tab5">待评价</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<!-- <div class="th th-item">
											<td class="td-inner">成交时间:</td>
										</div> -->
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">

											<!--所有订单-->
											@foreach($orders as $k=>$v)
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$v->oid}}</a></div>
													<span>成交时间:{{$v->otime}}</span>

												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="../images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$v->gname}}</p>

																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->price}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$v->dcnt}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">

																</div>
															</li>
														</ul>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$v->dcnt*$v->price}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	@if($v->ostatus == '0')
																		<p class="Mystatus">待发货</p>
																	@elseif($v->ostatus == '1')
																		<p class="Mystatus">待收货</p>
																	@elseif($v->ostatus == '2')
																		<p class="Mystatus">待评论</p>
																	@elseif($v->ostatus == '3')
																		<p class="Mystatus">代付款</p>
																	@elseif($v->ostatus == '4')
																		<p class="Mystatus">已完成</p>
																	@elseif($v->ostatus == '5')
																		<p class="Mystatus">订单已取消</p>
																	@endif

																</div>
															</li>
															<li class="td td-change">
																@if($v->ostatus == '0')
																	<div class="am-btn am-btn-danger anniu">
																		<a href="javascript:;" onclick="cancels({{$v->oid}})">取消订单</a></div>
																@elseif($v->ostatus == '1')
																	<div class="am-btn am-btn-danger anniu">
																		<a href="javascript:;" onclick="doGoods({{$v->oid}})">确认收货</a></div>
																@elseif($v->ostatus == '2')
																	<div class="am-btn am-btn-danger anniu">
																		<a href="{{url('home/comment/')/+$v->gid}}">待评论</a></div>
																@elseif($v->ostatus == '3')
																	<div class="am-btn am-btn-danger anniu">
																		<a href="">去付款</a></div>
																@elseif($v->ostatus == '4')
																	<div class="am-btn am-btn-danger anniu">
																		<a href="javascript:;" onclick="deletes({{$v->oid}})">删除订单</a></div>
																@endif

															</li>
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>

									</div>

								</div>
								<div class="am-tab-panel am-fade" id="tab2">

									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											{{--待付款--}}
											@foreach($orders as $k=>$v)
												@if($v->ostatus == '3')

												<div class="order-status5">
													<div class="order-title">
														<div class="dd-num">订单编号：<a href="javascript:;">{{$v->oid}}</a></div>
														<span>成交时间:{{$v->otime}}</span>

													</div>
													<div class="order-content">
														<div class="order-left">
															<ul class="item-list">
																<li class="td td-item">
																	<div class="item-pic">
																		<a href="#" class="J_MakePoint">
																			<img src="../images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																		</a>
																	</div>
																	<div class="item-info">
																		<div class="item-basic-info">
																			<a href="#">
																				<p>{{$v->gname}}</p>

																			</a>
																		</div>
																	</div>
																</li>
																<li class="td td-price">
																	<div class="item-price">
																		{{$v->price}}
																	</div>
																</li>
																<li class="td td-number">
																	<div class="item-number">
																		<span>×</span>{{$v->dcnt}}
																	</div>
																</li>
																<li class="td td-operation">
																	<div class="item-operation">

																	</div>
																</li>
															</ul>
														</div>
														<div class="order-right">
															<li class="td td-amount">
																<div class="item-amount">
																	合计：{{$v->dcnt*$v->price}}
																	{{--<p>含运费：<span>10.00</span></p>--}}
																</div>
															</li>
															<div class="move-right">
																<li class="td td-status">
																	<div class="item-status">
																		@if($v->ostatus == '0')
																			<p class="Mystatus">待发货</p>
																		@elseif($v->ostatus == '1')
																			<p class="Mystatus">待收货</p>
																		@elseif($v->ostatus == '2')
																			<p class="Mystatus">待评论</p>
																		@elseif($v->ostatus == '3')
																			<p class="Mystatus">代付款</p>
																		@elseif($v->ostatus == '4')
																			<p class="Mystatus">已完成</p>
																		@elseif($v->ostatus == '5')
																			<p class="Mystatus">订单已取消</p>
																		@endif
																	</div>
																</li>
																<li class="td td-change">
																	@if($v->ostatus == '0')
																		<div class="am-btn am-btn-danger anniu">
																			<a href="">取消订单</a></div>
																	@elseif($v->ostatus == '1')
																		<div class="am-btn am-btn-danger anniu">
																			<a href="">确认收货</a></div>
																	@elseif($v->ostatus == '2')
																		<div class="am-btn am-btn-danger anniu">
																			<a href="javascript:;" onclick="comment({{$v->oid}})">待评论</a></div>
																	@elseif($v->ostatus == '3')
																		<div class="am-btn am-btn-danger anniu">
																			<a href="">去付款</a></div>
																	@endif

																</li>
															</div>
														</div>
													</div>
												</div>

												@endif
											@endforeach

										</div>

									</div>


								</div>
								<div class="am-tab-panel am-fade" id="tab3">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											{{--待发货--}}
											@foreach($orders as $k=>$v)
												@if($v->ostatus == '0')

													<div class="order-status5">
														<div class="order-title">
															<div class="dd-num">订单编号：<a href="javascript:;">{{$v->oid}}</a></div>
															<span>成交时间:{{$v->otime}}</span>

														</div>
														<div class="order-content">
															<div class="order-left">
																<ul class="item-list">
																	<li class="td td-item">
																		<div class="item-pic">
																			<a href="#" class="J_MakePoint">
																				<img src="../images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																			</a>
																		</div>
																		<div class="item-info">
																			<div class="item-basic-info">
																				<a href="#">
																					<p>{{$v->gname}}</p>

																				</a>
																			</div>
																		</div>
																	</li>
																	<li class="td td-price">
																		<div class="item-price">
																			{{$v->price}}
																		</div>
																	</li>
																	<li class="td td-number">
																		<div class="item-number">
																			<span>×</span>{{$v->dcnt}}
																		</div>
																	</li>
																	<li class="td td-operation">
																		<div class="item-operation">

																		</div>
																	</li>
																</ul>
															</div>
															<div class="order-right">
																<li class="td td-amount">
																	<div class="item-amount">
																		合计：{{$v->dcnt*$v->price}}
																		{{--<p>含运费：<span>10.00</span></p>--}}
																	</div>
																</li>
																<div class="move-right">
																	<li class="td td-status">
																		<div class="item-status">
																			@if($v->ostatus == '0')
																				<p class="Mystatus">待发货</p>
																			@elseif($v->ostatus == '1')
																				<p class="Mystatus">待收货</p>
																			@elseif($v->ostatus == '2')
																				<p class="Mystatus">待评论</p>
																			@elseif($v->ostatus == '3')
																				<p class="Mystatus">代付款</p>
																			@elseif($v->ostatus == '4')
																				<p class="Mystatus">已完成</p>
																			@elseif($v->ostatus == '5')
																				<p class="Mystatus">订单已取消</p>
																			@endif
																		</div>
																	</li>
																	<li class="td td-change">
																		@if($v->ostatus == '0')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="javascript:;" onclick="cancels({{$v->oid}})">取消订单</a></div>
																		@elseif($v->ostatus == '1')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="">确认收货</a></div>
																		@elseif($v->ostatus == '2')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="javascript:;" onclick="comment({{$v->oid}})">待评论</a></div>
																		@elseif($v->ostatus == '3')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="">去付款</a></div>
																		@elseif($v->ostatus == '4')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="javascript:;" onclick="({{$v->oid}})">删除订单</a>
																			</div>
																		@endif

																	</li>
																</div>
															</div>
														</div>
													</div>

												@endif
											@endforeach
										</div>
									</div>
								</div>
								<div class="am-tab-panel am-fade" id="tab4">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											{{--待收货--}}
											@foreach($orders as $k=>$v)
												@if($v->ostatus == '1')

													<div class="order-status5">
														<div class="order-title">
															<div class="dd-num">订单编号：<a href="javascript:;">{{$v->oid}}</a></div>
															<span>成交时间:{{$v->otime}}</span>

														</div>
														<div class="order-content">
															<div class="order-left">
																<ul class="item-list">
																	<li class="td td-item">
																		<div class="item-pic">
																			<a href="#" class="J_MakePoint">
																				<img src="../images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																			</a>
																		</div>
																		<div class="item-info">
																			<div class="item-basic-info">
																				<a href="#">
																					<p>{{$v->gname}}</p>

																				</a>
																			</div>
																		</div>
																	</li>
																	<li class="td td-price">
																		<div class="item-price">
																			{{$v->price}}
																		</div>
																	</li>
																	<li class="td td-number">
																		<div class="item-number">
																			<span>×</span>{{$v->dcnt}}
																		</div>
																	</li>
																	<li class="td td-operation">
																		<div class="item-operation">

																		</div>
																	</li>
																</ul>
															</div>
															<div class="order-right">
																<li class="td td-amount">
																	<div class="item-amount">
																		合计：{{$v->dcnt*$v->price}}
																		{{--<p>含运费：<span>10.00</span></p>--}}
																	</div>
																</li>
																<div class="move-right">
																	<li class="td td-status">
																		<div class="item-status">
																			@if($v->ostatus == '0')
																				<p class="Mystatus">待发货</p>
																			@elseif($v->ostatus == '1')
																				<p class="Mystatus">待收货</p>
																			@elseif($v->ostatus == '2')
																				<p class="Mystatus">待评论</p>
																			@elseif($v->ostatus == '3')
																				<p class="Mystatus">代付款</p>
																			@elseif($v->ostatus == '4')
																				<p class="Mystatus">已完成</p>
																			@elseif($v->ostatus == '5')
																				<p class="Mystatus">订单已取消</p>
																			@endif
																		</div>
																	</li>
																	<li class="td td-change">
																		@if($v->ostatus == '0')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="">取消订单</a>
																			</div>
																		@elseif($v->ostatus == '1')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="javascript:;" onclick="doGoods({{$v->oid}})">确认收货</a>
																			</div>
																		@elseif($v->ostatus == '2')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="javascript:;" onclick="comment({{$v->oid}})">待评论</a></div>
																			</div>
																		@elseif($v->ostatus == '3')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="">去付款</a>
																			</div>
																		@elseif($v->ostatus == '4')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="javascript:;" onclick="deletes({{$v->oid}})">删除订单</a>
																			</div>
																		@endif
																	</li>
																</div>
															</div>
														</div>
													</div>

												@endif
											@endforeach
										</div>
									</div>
								</div>

								<div class="am-tab-panel am-fade" id="tab5">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											{{--待评论--}}
											@foreach($orders as $k=>$v)
												@if($v->ostatus == '2')

													<div class="order-status5">
														<div class="order-title">
															<div class="dd-num">订单编号：<a href="javascript:;">{{$v->oid}}</a></div>
															<span>成交时间:{{$v->otime}}</span>

														</div>
														<div class="order-content">
															<div class="order-left">
																<ul class="item-list">
																	<li class="td td-item">
																		<div class="item-pic">
																			<a href="#" class="J_MakePoint">
																				<img src="../images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																			</a>
																		</div>
																		<div class="item-info">
																			<div class="item-basic-info">
																				<a href="#">
																					<p>{{$v->gname}}</p>

																				</a>
																			</div>
																		</div>
																	</li>
																	<li class="td td-price">
																		<div class="item-price">
																			{{$v->price}}
																		</div>
																	</li>
																	<li class="td td-number">
																		<div class="item-number">
																			<span>×</span>{{$v->dcnt}}
																		</div>
																	</li>
																	<li class="td td-operation">
																		<div class="item-operation">

																		</div>
																	</li>
																</ul>
															</div>
															<div class="order-right">
																<li class="td td-amount">
																	<div class="item-amount">
																		合计：{{$v->dcnt*$v->price}}
																		{{--<p>含运费：<span>10.00</span></p>--}}
																	</div>
																</li>
																<div class="move-right">
																	<li class="td td-status">
																		<div class="item-status">
																			@if($v->ostatus == '0')
																				<p class="Mystatus">待发货</p>
																			@elseif($v->ostatus == '1')
																				<p class="Mystatus">待收货</p>
																			@elseif($v->ostatus == '2')
																				<p class="Mystatus">待评论</p>
																			@elseif($v->ostatus == '3')
																				<p class="Mystatus">代付款</p>
																			@elseif($v->ostatus == '4')
																				<p class="Mystatus">已完成</p>
																			@elseif($v->ostatus == '5')
																				<p class="Mystatus">订单已取消</p>
																			@endif
																		</div>
																	</li>
																	<li class="td td-change">
																		@if($v->ostatus == '0')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="">取消订单</a></div>
																		@elseif($v->ostatus == '1')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="">确认收货</a></div>
																		@elseif($v->ostatus == '2')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="{{url('home/comment')/+$v->gid}}">待评论</a></div>
																		@elseif($v->ostatus == '3')
																			<div class="am-btn am-btn-danger anniu">
																				<a href="">去付款</a></div>
																		@endif

																	</li>
																</div>
															</div>
														</div>
													</div>

												@endif
											@endforeach


										</div>

									</div>

								</div>
							</div>

						</div>
					</div>
				</div>
				<script type="text/javascript">
				//确认收货
                    function doGoods(oid) {
                        layer.confirm('是否确认收货？', {
                            btn: ['确认', '返回'] //按钮
                        }, function (index) {
                            layer.close(index);
                            location.href = ("{{ url('/home/order') }}/" + oid);
                        });
                    };
                    //删除订单
                    function deletes(id) {
                        layer.confirm('是否删除订单？', {
                            btn: ['确认', '返回'] //按钮
                        }, function (){
                                $.post("{{url('home/order/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){

                                    if(data.status == 0){
                                        location.href = location.href;
                                        layer.msg(data.msg, {icon: 6});
                                    }else{
                                        location.href = location.href;
                                        layer.msg(data.msg, {icon: 5});
                                    }
								});
                        });
                    }

                    function cancels(id) {
                        layer.confirm('是否取消订单？', {
                            btn: ['确认', '返回'] //按钮
                        }, function (){
                            $.post("{{url('home/order/')}}/"+id,{'_method':'put','_token':"{{csrf_token()}}"},function(data){

                                if(data.status == 0){
                                    location.href = location.href;
                                    layer.msg(data.msg, {icon: 6});
                                }else{
                                    location.href = location.href;
                                    layer.msg(data.msg, {icon: 5});
                                }
                            });
                        });
                    }



				</script>

				<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有</em>
						</p>
					</div>

				</div>
			</div>
			<aside class="menu">
				<ul>
					<li class="person">
						<a href="index.html">个人中心</a>
					</li>
					<li class="person">
						<a href="#">个人资料</a>
						<ul>
							<li> <a href="information.html">个人信息</a></li>
							<li> <a href="safety.html">安全设置</a></li>
							<li> <a href="address.html">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li class="active"><a href="order.html">订单管理</a></li>
							<li> <a href="change.html">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="coupon.html">优惠券 </a></li>
							<li> <a href="bonus.html">红包</a></li>
							<li> <a href="bill.html">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="collection.html">收藏</a></li>
							<li> <a href="foot.html">足迹</a></li>
							<li> <a href="comment.html">评价</a></li>
							<li> <a href="news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>

	</body>

</html>