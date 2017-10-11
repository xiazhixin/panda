<!-- 后台首页 -->
<!-- 样式路径"{{asset('admin/style/xxxxxxxxxxxxx')}}" -->
@section('title', '首页')
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Advanced Table
                </header>
                <div class="search_wrap" style="margin:20px;">
                    <form action="" method="get">
                        <table class="search_tab">
                            <tr>
                                <th width="70">关键字:</th>
                                <td><input type="text" name="keywords" value="" placeholder="关键字"></td>
                                <td><input type="submit"  value="查询"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <table class="table table-striped table-advance table-hover">
                    <thead>

                    <tr>
                        <th><i class="icon-bullhorn"></i> ID</th>
                        <th class="hidden-phone"><i class="icon-question-sign"></i> 用户姓名</th>
                        <th><i class="icon-bookmark"></i> 邮箱</th>
                        <th><i class=" icon-edit"></i> 权限</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $input as $k=>$v)
                    <tr>
                        <td><a href="#">{{$v->aid}}</a></td>
                        <td class="hidden-phone">{{$v->aname}}</td>
                        <td>{{$v->aemail}}</td>

                        <td class="hidden-phone">{{$th[$v->auth]}}</td>
                        <td>
                            <a href="{{url('admin/user/'.$v->aid.'/edit')}}"> <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                            <a href="">  <button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button> </a>
                        </td>
                    </tr>
                     @endforeach
                    </tbody>

                </table>
            </section>
        </div>
    </div>



@endsection