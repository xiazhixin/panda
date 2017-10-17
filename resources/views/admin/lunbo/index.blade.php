<!-- 后台首页 -->
<!-- 样式路径"{{asset('admin/style/xxxxxxxxxxxxx')}}" -->
@section('title', '首页')
@extends('layouts.admin')
@section('content')

    <div class="row">

        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   轮播用户浏览
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
                        <th class="hidden-phone"><i class="icon-question-sign"></i> 轮播昵称</th>
                        <th><i class="icon-bookmark"></i> 图片</th>
                        <th><i class=" icon-edit"></i> 添加时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $user as $k=>$v)
                    <tr>
                        <td><a href="#">{{$v->lid}}</a></td>
                        <td class="hidden-phone">{{$v->lname}}</td>

                        <td class="hidden-phone"><img src="{{$v->art_thumb}}" width="100px" alt=""></td>
                        <td>{{date("Y-m-d H:i:sa", $v->ltime)}}</td>
                        <td>
                            <a href="{{url('admin/lunbo/'.$v->lid.'/edit')}}"> <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                            <a href="javascript:;" onclick="delUser({{$v->lid}})">  <button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button> </a>
                        </td>
                    </tr>
                     @endforeach
                    </tbody>

                </table>
                {{--<div class="page_list" style="float: right;">--}}
                    {{--{!! $users->appends(['keywords' => $input])->render() !!}--}}
                {{--</div>--}}
            </section>

        </div>
    </div>

    <script>

        function delUser(id){

            //询问框
            layer.confirm('确认删除？', {
                btn: ['确认','取消'] //按钮
            }, function(){
//                通过ajax 向服务器发送一个删除请求

//                $.post('请求的路径'，携带的数据参数，执行后返回的数据)
//                {'key':'value','key1':'value1'}
                $.post("{{url('admin/lunbo/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
//                    需要将json字符串变成json对象
                    //var data = JSON.parse(data);
                        console.log(data);
//                    JSON.parse(jsonstr); //可以将json字符串转换成json对象
//                    JSON.stringify(jsonobj); //可以将json对象转换成json对符串

                    if(data.status == 0){
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    }else{
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 5});
                    }


                })
//

            });
        }

    </script>


@endsection