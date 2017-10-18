<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->

    <link rel="stylesheet" type="text/css" href="{{asset('/admin/bootstrap/css/bootstrap.min.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/fonts/ptsans/stylesheet.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/fonts/icomoon/style.css')}}" media="screen" >

    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/login.css')}}" media="screen">

    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/mws-theme.css')}}" media="screen">

<title>MWS Admin - Login Page</title>

</head>

<body>

    <div id="mws-login-wrapper">

        <div id="mws-login">
            <h1>
                <marquee behavior="" direction="">Panda Login</marquee></h1>
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
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="{{url('admin/dologin')}}" method="post">
                    {{csrf_field()}}
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="aname" class="mws-login-username required" placeholder="请输入账号"value="{{old('aname')}}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="apassword" class="mws-login-password required" placeholder="请输入密码" value="{{old('apassword')}}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <input type="text" name="code" class=" required" placeholder="请输入验证码" style="width:140px; padding-top:10px; ">
                       
						<img src="{{url('admin/yzm')}}" onclick="this.src='{{url('admin/yzm')}}?'+Math.random()" alt="">

                    </div>
                    <div id="mws-login-remember" class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li>
                                <input id="remember" type="checkbox" checked="checked">
                                <label for="remember">记住账号</label>
                            </li>
                        </ul>
                    </div>
                    <div class="mws-form-row">
                        <input type="submit" value="登录" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="{{asset('/admin/js/libs/jquery-1.8.3.min.js')}}"></script>
    <script src="{{asset('/admin/js/libs/jquery.placeholder.min.js')}}"></script>
    <script src="{{asset('/admin/custom-plugins/fileinput.js')}}"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="{{asset('/admin/jui/js/jquery-ui-effects.min.js"')}}></script>

    <!-- Plugin Scripts -->
    <script src="{{asset('/admin/plugins/validate/jquery.validate-min.js')}}"></script>

    <!-- Login Script -->
    <script src="{{asset('/admin/js/core/login.js')}}"></script>

</body>
<script type="text/javascript">
    function re_captcha() {
        $url = "{{ URL('/code/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
    }
</script>
</html>
