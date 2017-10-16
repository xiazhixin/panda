<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="/home/css/dlstyle.css" rel="stylesheet" type="text/css">
        <script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
        <script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="/home/images/logobig.png" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="/home/images/big.jpg" /></div>
				<div class="login-box">

							<h3 class="title">登录商城</h3>

							<div class="clear">
								<h4 style="color:red;">
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
								</h4>
							</div>
						
						<div class="login-form">
						<form action="{{url('home/dologin')}}" method="post">
                            {{csrf_field()}}
							   <div class="user-name">
								    <label for="user"><i class="am-icon-user"></i></label>
								    <input type="text" name="uname" id="user" placeholder="用户名" value="{{old('uname')}}">
                 </div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="upassword" id="password" placeholder="请输入密码" value="{{old('upassword')}}">
                 </div>

							<div class="mws-form-row">
								<input type="text" name="code" class=" required" placeholder="请输入验证码" style="width:190px; padding-top:10px; ">

								<img src="{{url('admin/yzm')}}" onclick="this.src='{{url('admin/yzm')}}?'+Math.random()" alt="">

							</div>

           </div>
            
            <div class="login-links">
                <label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
								<a href="#" class="am-fr">忘记密码</a>
								<a href="{{url('home/register1')}}" class="zcnext am-fr am-btn-default">注册</a>
								<br />
            </div>
								<div class="am-cf">

									<button  name=""value="" class="am-btn am-btn-primary am-btn-sm" >登 录</button>
								</div>
					</form>

						<div class="partner">		
								<h3>合作账号</h3>
							<div class="am-btn-group">
								<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
								<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
								<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
							</div>
						</div>	

				</div>
			</div>
		</div>


					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有</em>
							</p>
						</div>
					</div>
	</body>

	<script type="text/javascript">

        function re_captcha() {
            $url = "{{ URL('/code/captcha') }}";
            $url = $url + "/" + Math.random();
            document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
        }
        //用户名
        //获取焦点
        $('input[name=uname]').focus(function(){

            $(this).css('border','solid 1px blue');
        })
        //失去焦点
		$('input[name=uname]').blur(function(){

            $(this).css('border','solid 0px  ');
        })


        //密码获取焦点
        $('input[name=upassword]').focus(function(){

             $(this).css('border','solid 1px blue');
//
        })
        //失去焦点
		$('input[name=upassword]').blur(function(){

             $(this).css('border','solid 0px ');
//
        })
		$('input[name=code]').focus(function(){

            $(this).css('border','solid 1px blue');
//
        })
        $('input[name=code]').blur(function(){

            $(this).css('border','solid 0px ');
//
        })


	</script>
</html>