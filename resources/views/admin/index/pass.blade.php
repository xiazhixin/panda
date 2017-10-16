<!-- 后台首页 -->
@extends('layouts.admin')
@section('title', '首页')

@section('content')
    <div class="col-lg-12">
        <section class="panel">
            <!--面包屑导航 开始-->
            <div class="crumb_warp">
                <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
                <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; 修改密码
            </div>
            <!--面包屑导航 结束-->
            <div class="result_wrap">
                <div class="result_title">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @if(is_object($errors))
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                @else
                                    <li>{{ session('errors') }}</li>
                                @endif
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="panel-body">
                <form method="post" class="form-horizontal tasi-form" action="{{url('admin/dorepass')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><i style="color:red">*</i>原密码:</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="password" name="password_o"> </i>请输入原始密码</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><i style="color:red">*</i>新密码:</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="password" name="password"> </i>新密码6-20位</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><i style="color:red">*</i>新密码:</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="password" name="password_c"> </i>再次输入密码</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSuccess" class=" col-sm-2"></label>
                        <input class="btn btn-primary col-sm-1" type="submit" value="提交">
                        <input type="button" class="btn btn-default col-sm-1" class="back" onclick="history.go(-1)" value="返回">
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection