<!-- 后台父模板 -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{asset('admin/style/img/favicon.html')}}">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('admin/style/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/style/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('admin/style/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/style/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{asset('admin/style/css/owl.carousel.css')}}" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{asset('admin/style/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/style/css/style-responsive.css')}}" rel="stylesheet" />
{{--    <script src="{{asset('admin/style/js/html5shiv.js')}}"></script>--}}
{{--    <script src="{{asset('admin/style/js/respond.min.js')}}"></script>--}}


      <!-- js placed at the end of the document so the pages load faster -->
      <script src="{{asset('admin/style/js/jquery.js')}}"></script>
      <script src="{{asset('admin/style/js/jquery-1.8.3.min.js')}}"></script>
      <script src="{{asset('admin/style/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('admin/style/js/jquery.scrollTo.min.js')}}"></script>
      <script src="{{asset('admin/style/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
      <script src="{{asset('admin/style/js/jquery.sparkline.js')}}" type="text/javascript"></script>
      <script src="{{asset('admin/style/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
      <script src="{{asset('admin/style/js/owl.carousel.js')}}" ></script>
      <script src="{{asset('admin/style/js/jquery.customSelect.min.js')}}" ></script>

      {{--删除插件--}}
      <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>

  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="切换导航" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="#" class="logo">Pan<span>da</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-tasks"></i>
                            <span class="badge bg-success">6</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 6 pending tasks</p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Dashboard v1.3</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Database Update</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Iphone Development</div>
                                        <div class="percent">87%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                            <span class="sr-only">87% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Mobile App</div>
                                        <div class="percent">33%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                            <span class="sr-only">33% Complete (danger)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">Dashboard v1.3</div>
                                        <div class="percent">45%</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            <span class="sr-only">45% Complete</span>
                                        </div>
                                    </div>

                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-alt"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{asset('admin/style/img/avatar-mini.jpg')}}"></span>
                                    <span class="subject">
                                    <span class="from">Jonathan Smith</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="img/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jhon Doe</span>
                                    <span class="time">10 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, Jhon Doe Bhai how are you ?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{asset('admin/style/img/avatar-mini3.jpg')}}"></span>
                                    <span class="subject">
                                    <span class="from">Jason Stathum</span>
                                    <span class="time">3 hrs</span>
                                    </span>
                                    <span class="message">
                                        This is awesome dashboard.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{{asset('admin/style/img/avatar-mini4.jpg')}}"></span>
                                    <span class="subject">
                                    <span class="from">Jondi Rose</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is metrolab
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-alt"></i>
                            <span class="badge bg-warning">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">You have 7 new notifications</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon-bolt"></i></span>
                                    Server #3 overloaded.
                                    <span class="small italic">34 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-warning"><i class="icon-bell"></i></span>
                                    Server #10 not respoding.
                                    <span class="small italic">1 Hours</span>
                                </a> 
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon-bolt"></i></span>
                                    Database overloaded 24%.
                                    <span class="small italic">4 hrs</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-success"><i class="icon-plus"></i></span>
                                    New user registered.
                                    <span class="small italic">Just now</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                    Application error.
                                    <span class="small italic">10 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">See all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{asset('admin/style/img/avatar1_small.jpg')}}">
                            <span class="username">{{session('user')->aname}}</span>

                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>

                            <li><a href="{{url('admin/repass')}}"><i class=" icon-suitcase"></i>修改密码</a></li>
                            <li><a href="#"><i class="icon-cog"></i> 设置</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i>通知</a></li>
                            <li><a href="{{url('admin/logout')}}"><i class="icon-key"></i>退出</a></li>

                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="{{url('home/login')}}">
                          <i class="icon-home"></i>
                          <span>首页</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="{{url('admin/uindex')}}">

                          <i class="icon-male"></i>
                          <span>前台用户</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-user"></i>
                          <span>后台用户</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">

                          <li><a class="" href="{{url('admin/user/create')}}">添加用户</a></li>
                          <li><a class="" href="{{url('admin/user')}}">用户列表</a></li>

                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-sitemap"></i>
                          <span>类别管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">

                          <li><a class="" href="{{url('admin/cate/')}}">浏览类别</a></li>
                          <li><a class="" href="{{url('admin/cate/create')}}">添加类别</a></li>
                      </ul>
                  <li class="sub-menu">
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-apple"></i>
                          <span>品牌管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('admin/brand')}}">浏览品牌</a></li>
                          <li><a class="" href="{{url('admin/brand/create')}}">添加品牌</a></li>

                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-shopping-cart"></i>
                          <span>商品管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('admin/goods/create')}}">添加商品</a></li>
                          <li><a class="" href="{{url('admin/goods')}}">浏览商品</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-shopping-cart"></i>
                          <span>推荐商品管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('admin/tui/create')}}">添加商品</a></li>
                          <li><a class="" href="{{url('admin/tui')}}">浏览商品</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-bookmark"></i>
                          <span>标签管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="blank.html">Blank Page</a></li>
                          <li><a class="" href="profile.html">Profile</a></li>
                          <li><a class="" href="invoice.html">Invoice</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                          <li><a class="" href="500.html">500 Error</a></li>
                      </ul>
                  </li>
                 <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>专题管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('admin/activity')}}">专题列表</a></li>
                          <li><a class="" href="{{url('admin/activity/create')}}">专题添加</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-building"></i>
                          <span>订单管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('admin/order')}}">浏览订单</a></li>

                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-heart"></i>
                          <span>评论管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('admin/comment')}}">浏览评论</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-phone-sign"></i>
                          <span>客服管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="blank.html">Blank Page</a></li>
                          <li><a class="" href="profile.html">Profile</a></li>
                          <li><a class="" href="invoice.html">Invoice</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                          <li><a class="" href="500.html">500 Error</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-star"></i>
                          <span>广告管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="blank.html">Blank Page</a></li>
                          <li><a class="" href="profile.html">Profile</a></li>
                          <li><a class="" href="invoice.html">Invoice</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                          <li><a class="" href="500.html">500 Error</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="{{url('admin/back')}}" class="">
                          <i class="icon-comment"></i>
                          <span>反馈管理</span>
                      </a>

                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-picture"></i>
                          <span>轮播图管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('admin/lunbo/create')}}">添加轮播图</a></li>
                          <li><a class="" href="{{url('admin/lunbo')}}">浏览轮播图</a></li>

                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-cogs"></i>
                          <span>网站配置</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{url('admin/config')}}">网站基本信息</a></li>
                          <li><a class="" href="{{url('admin/config/create')}}">添加网站配置</a></li>
                          <li><a class="" href="{{url('admin/config')}}">网站配置列表</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

            @section('content')
        
            @show
        </section>
      </section>
      <!--main content end-->
  </section>

  {{--商品列表页2个--}}
  <script type="text/javascript" src="{{asset('admin/style/assets/data-tables/jquery.dataTables.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin/style/assets/data-tables/DT_bootstrap.js')}}"></script>
  <!--common script for all pages-->
  <script src="{{asset('admin/style/js/common-scripts.js')}}"></script>

  <!--script for this page-->
  <script src="{{asset('admin/style/js/sparkline-chart.js')}}"></script>
  <script src="{{asset('admin/style/js/easy-pie-chart.js')}}"></script>
  <!--script for this page-->
  {{--      <script src="{{asset('admin/style/js/form-validation-script.js')}}"></script>--}}
  <script type="text/javascript" src="{{asset('admin/style/js/jquery.validate.min.js')}}"></script>
  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
