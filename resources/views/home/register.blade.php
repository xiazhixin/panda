<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/home/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/home/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="/home/images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/home/images/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">账号注册</a></li>

							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-active">
						<form method="post" action="{{url('home/doregister')}}" >
										
						{{csrf_field()}}
                 		<div class="user-pass">
								    <label for="name"><i class="am-icon-group"></i></label>
								    <input type="name" name="uname" id="name" placeholder="输入账号">
						</div>
						<div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="upassword" id="password" placeholder="设置密码">
                		  </div>
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="erpassword" id="passwordRepeat" placeholder="确认密码">
                 </div>
						<div class="user-email">
								<label for="email"><i class="am-icon-envelope-o"></i></label>
								<input type="email" name="email" id="email" placeholder="请输入邮箱账号">
					    </div>


						<div class="user-email">

								<input type="text" name="code" id="code" placeholder="请输入验证码" style="width:180px;">
							<a onclick="javascript:re_captcha();">
								<img src="{{ URL('/code/captcha/1') }}" id="127ddf0de5a04167a9e427d883690ff6" ">
							</a>
					    </div>

										<div class="am-cf">

											<button name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">注册</button>
										</div>

								</div>
						</form>


								<script>
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })
								</script>

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
	</script>

</html>