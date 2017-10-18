<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>

		<link href="{{asset('home//AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('home//basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('home//css/cartstyle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('home//css/optstyle.css')}}" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="{{asset('home//js/jquery.js')}}"></script>
		<link type="text/css" rel="stylesheet" href="{{asset('cart/css/reset.css')}}">
		<link type="text/css" rel="stylesheet" href="{{asset('cart/css/carts.css')}}">
		<style>
			.order_lists .list_amount .amount_box input{
				height:23px;
			}
			.my_model{
				height:200px;
			}
		</style>
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


<section class="cartMain">
    <div class="cartMain_hd">
        <ul class="order_lists cartTop">
            <li class="list_chk">
                <!--所有商品全选-->
                <input type="checkbox" id="all" class="whole_check">

                <label id="allbox"  onclick="allbox()" for="all"></label>
                全选
            </li>
            <li class="list_con">商品信息</li>
            <li class="list_info">商品参数</li>
            <li class="list_price">单价</li>
            <li class="list_amount">数量</li>
            <li class="list_sum">金额</li>
            <li class="list_op">操作</li>
        </ul>
    </div>
	<form action="{{url('home/pay')}}" method="post">	<!--购物车 -->
	{{ csrf_field() }}
    <div class="cartBox">
        
        <div class="order_content">
		@foreach ($carts as $k=>$v)
			<script>
				function allbox() {
            		var lab = $('#allbox');
            		var mark = lab.attr("class");
            		if (mark == '') {
            			//
            			//
            			$('#checkbox_'+id).attr("value",id);
            		} else {
            			return false;
            		}
            	}
			</script>
            <ul class="order_lists">
                <li class="list_chk">
                    <input type="checkbox" id="checkbox_{{$v->id}}" name="id[]" value="" class="son_check">
                    <label class="" onclick="js({{$v->id}})" for="checkbox_{{$v->id}}" >
                    </label>
                </li>
                <li class="list_con">
                    <div class="list_img"><a href="javascript:;"><img src="{{asset($v->gpic)}}" alt=""></a></div>
                    <div class="list_text"><a href="javascript:;">{{$v->gname}}</a></div>
                </li>
                <li class="list_info">
                    <p>规格：默认</p>
                    <p>尺寸：16*16*3(cm)</p>
                </li>
                <li class="list_price">
                    <p class="price" id="" >{{$v->price}}</p>
                </li>
                <li class="list_amount">
                    <div class="amount_box">
                        <a href="javascript:;" onclick="jian({{$v->id}})" class="reduce reSty">-</a>
                        <input type="text" value="{{$v->num}}" id="bcnt_{{$v->id}}" class="sum">
                        <a href="javascript:;" onclick="jia({{$v->id}})" class="plus">+</a>
                <script>
                	function jia(id) {
                		// alert(id);
                		var bcnt = $('#bcnt_'+id).val();
                		bcnt = parseInt(bcnt)+parseInt(1);
                		// alert(bcnt);
                		$.post("{{url('home/num')}}",{'id':id,'num':bcnt,'_token':"{{csrf_token()}}"},function(data){
                				if (data == 1) {
                					location.reload();
                				}
					        })
                	}
                </script>
                        <script>
                        	function jian(id) {
                        		var bcnt = $('#bcnt_'+id).val();
                        		bcnt = parseInt(bcnt)-parseInt(1)
                        		$.post("{{url('home/numjian')}}",{'id':id,'num':bcnt,'_token':"{{csrf_token()}}"},function(data){
                        			if (data == 1) {
                					location.reload();
                					}
					        	})
	                		// location.reload();
	                		 // location=location
                        	}
                        </script>
                    </div>
                </li>
                <li class="list_sum">
                    <p class="sum_price">￥{{$v->price*$v->num}}</p>
                </li>
                <li class="list_op">
                    <p class="del"><a href="javascript:;" onclick="delid({{$v->id}})" class="">移除商品</a></p>
             <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>

                    <script>
                    	function delid(id){
				          //询问框
				          layer.confirm('确认删除？', {
				              btn: ['确认','取消']
				          },function(){
				              $.post("{{url('home/delcart/')}}/"+id,{'_token':"{{csrf_token()}}"},function(data){
				              		// alert(data);
				                  if(data.status == 0){
				                      location.href = location.href;
				                      layer.msg(data.msg, {icon: 6});
				                  }else{
				                      location.href = location.href;
				                      layer.msg(data.msg, {icon: 5});
				                  }
				              })
					        });
					     }
                    </script>
                </li>
            </ul>
            <input type="hidden" name="gid" value="eqwr" />
            @endforeach
        </div>
    </div>

<style>
	#button{
		width:121px;
		height:50px;
		background:red;

	}
</style>
    
    <!--底部-->
    <div class="bar-wrapper">
        <div class="bar-right">
            <div class="piece">已选商品<strong class="piece_num">0</strong>件</div>
            <div class="totalMoney">共计: <strong id="bbb" class="total_text">0.00</strong></div>
            <div class="calBtn"><a href="javascript:;">
				<button id="button">结算</button>
				<script>
					$('#button').click(function(){
						var aaa = $('#bbb').val();
						// alert(aaa);
					})
				</script>
            </a></div>
            <script>
            	// ------------------------------
            	function js(id) {
            		var lab = $('#checkbox_'+id).next('label');
            		var mark = lab.attr("class");
            		if (mark == '') {
            			$('#checkbox_'+id).attr("value",id);
            		} else {
            			return false;
            		}
            	}
            	
            </script>
        </div>
    </div>
</section>
<section class="model_bg"></section>
<section class="my_model">

</section>
</form>
<script type="text/javascript" src="{{asset('cart/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('cart/js/carts.js')}}"></script>
</body>

</html>