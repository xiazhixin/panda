<!-- 后台首页 -->
@extends('layouts.admin')
@section('title', '首页')
@section('content')
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                配置项列表
            </header>
            <form action="{{url('admin/config/changecontent')}}" method="post">
            <table class="table table-striped table-advance table-hover">
                <thead>
                <tr>

                    <th class="hidden-phone"><i class="icon-question-sign"></i> ID</th>
                    <th><i class="icon-bookmark"></i> 标题</th>
                    <th><i class=" icon-edit"></i> 名称</th>
                    <th><i class=" icon-edit"></i> 内容</th>
                    <th><i class=" icon-edit"></i> 操作</th>

                </tr>
                </thead>
                <tbody>
                {{csrf_field()}}
            @foreach($config as $k=>$v)
                <tr>
                    <td>{{$v->conf_id}}</td>
                    <td class="hidden-phone">
                        <a href="#">{{$v->conf_title}}</a>
                    </td>
                    <td>
                        <a href="#">{{$v->conf_name}}</a>
                    </td>
                    <td>
                        <input type="hidden" name="conf_id[]" value="{{$v->conf_id}}">
                        <a href="#">{!! $v->_content !!}</a>
                    </td>
                    <td>
                        <a href="{{url('admin/config/'.$v->conf_id.'/edit')}}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                        <a href="javascript:;" onclick="delArt({{$v->conf_id}})"><button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button></a>
                    </td>
                </tr>
                @endforeach
                <tr >
                    <td colspan="6">

                        <button class="btn btn-primary col-sm-1"  type="submit">提交</button>
                    </td>
                </tr>
                </tbody>

            </table>
        </form>
        </section>
    </div>
    <script>

        function delArt(id){

            layer.confirm('确认删除？', {
                btn: ['确认','取消'] //按钮
            }, function(){

                $.post("{{url('admin/config')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
//                   console.log(data);
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

@endsection