@extends('layouts.admin')
@section('title','浏览全部商品')
@section('content')

  <body>
  <section id="container" class="">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              商品列表
                          </header>
                          <!--结果页快捷搜索框 开始-->
                          <div class="search_wrap" style="margin:20px;">
                              <form action="" method="get">
                                  <table class="search_tab">
                                      <tr>
                                          <th width="70">关键字:</th>
                                          <td><input type="text" name="keywords" value="{{$input}}" placeholder="关键字"></td>
                                          <td><input type="submit"  value="查询"></td>
                                      </tr>
                                  </table>
                              </form>
                          </div>

                          <table class="table table-striped border-top" id="sample_1">
                              <thead>
                                  <tr>
                                      <th>商品ID</th>
                                      <th>商品名称</th>
                                      <th class="hidden-phone">描述</th>
                                      <th class="hidden-phone">库存</th>
                                      <th class="hidden-phone">上架时间</th>
                                      <th class="hidden-phone">状态</th>
                                      <th class="hidden-phone">操作</th>
                                  </tr>
                              </thead>
                              <tbody>

                              @foreach($goods as $k=>$v)
                                <tr class="odd gradeX">
                                  <td>{{$v->gid}}</td>
                                  <td class="hidden-phone">{{$v->gname}}</td>
                                  <td class="hidden-phone">{{$v->gdesc}}</td>
                                  <td class="hidden-phone">{{$v->stock}}</td>
                                  <td class="center hidden-phone">{{$v->created_at}}</td>
                                    <td class="hidden-phone">
                                        @if( $v->status == 1)
                                            新品
                                        @elseif($v->status == 2)
                                            上架
                                        @elseif($v->status == 3)
                                            下架
                                        @endif
                                    </td>
                                  <td class="hidden-phone">
                                      <a href="{{url('admin/goods/'.$v->gid.'/edit')}}">修改</a>
                                      <a href="javascript:;" onclick="delGoods({{$v->gid}})">删除</a>
                                  </td>
                                </tr>
                               @endforeach

                              </tbody>
                          </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
      {{--分页--}}
      <div class="page_list">
          {!! $goods->render() !!}
      </div>
      <!--main content end-->
  </section>

    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>

  <script>
      function delGoods(gid){
          //询问框
          layer.confirm('确认删除？', {
              btn: ['确认','取消']
          },function(){
              $.post("{{url('admin/goods/')}}/"+gid,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
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



  </body>
@endsection
