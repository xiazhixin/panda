@extends('layouts.admin')
@section('title','浏览评论')
@section('content')

  <body>
  <section id="container" class="">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              评论列表
                          </header>
                          <!--结果页快捷搜索框 开始-->
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

                          <table class="table table-striped border-top" id="sample_1">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>商品名称</th>
                                      <th>商品ID</th>
                                      <th class="hidden-phone">买家</th>
                                      <th class="hidden-phone">评论内容</th>
                                      <th class="hidden-phone">评论时间</th>
                                      <th class="hidden-phone">操作</th>
                                  </tr>
                              </thead>
                              <tbody>

                              @foreach($comments as $k=>$v)
                                <tr class="odd gradeX">
                                  <td>{{$v->id}}</td>
                                  <td class="hidden-phone">{{$v->gname}}</td>
                                  <td class="hidden-phone">{{$v->gid}}</td>
                                  <td class="hidden-phone">{{$v->uid}}</td>
                                  <td class="hidden-phone">{{$v->content}}</td>
                                  <td class="center hidden-phone">{{$v->ctime}}</td>
                                  <td class="hidden-phone">
                                      <a href="{{url('admin/comment/'.$v->id.'/edit')}}">回复</a>
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
          {!! $comments->render() !!}
      </div>
      <!--main content end-->
  </section>

    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>

  </body>
@endsection
