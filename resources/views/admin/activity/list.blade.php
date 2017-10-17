<!-- 后台首页 -->
<!-- 样式路径"{{asset('admin/style/xxxxxxxxxxxxx')}}" -->
@section('title', '反馈管理')
@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    反馈管理
                </header>
                <div class="search_wrap" style="margin:20px;">
                    <form action="{{url('admin/activity')}}" method="get">
                                  <table class="search_tab">
                                      <tr>
                                          <th width="70">关键字:</th>
                                          <td><input type="text" name="keywords" value="{{$input}}" placeholder="关键字"></td>
                                          <td><input type="submit"  value="查询"></td>
                                      </tr>
                                  </table>
                              </form>
                </div>

                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th class="hidden-phone"><i class="icon-question-sign"></i> id</th>
                        <th><i class="icon-bookmark"></i>专题名称</th>
                        <th><i class="icon-bookmark"></i> 专题描述</th>
                        <th><i class=" icon-edit"></i>商品id</th>
                        <th><i class="icon-bookmark"></i> 创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($activity as $k=>$v)
                    <tr>
                        <td><a href="#">{{$v->activity_id}}</a></td>
                        <td><a href="#">{{$v->activity_name}}</a></td>
                        <td><a href="#">{{$v->activity_description}}</a></td>
                        <td><a href="#">{{$v->activity_gid}}</a></td>
                        <td><a href="#">{{$v->created_at}}</a></td>
                        <td>
                            <a href="{{url('admin/activity/'.$v->activity_id.'/edit')}}">修改</a> |
                            <a href="javascript:;" onclick="delActivity({{$v->activity_id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
                <div class="page_list" style="float: right;">
                </div>
            </section>
                {{--分页--}}
              <div id="render" class="page_list">
                  {!! $activity->render() !!}
              </div>
              <!--main content end-->
        </div>
    </div>

    <script>

        function delActivity(id){

            //询问框
            layer.confirm('确认删除？', {
                btn: ['确认','取消'] 
            }, function(){
                $.post("{{url('admin/activity/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
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


        function look(id){
            layer.open({
              type: 2,
              area: ['700px', '450px'],
              fixed: false, //不固定
              maxmin: true,
              content: 'cate'
            });
        }

    </script>




@endsection