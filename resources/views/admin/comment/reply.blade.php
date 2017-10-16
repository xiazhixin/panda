@extends('layouts.admin')
@section('title','回复评论')
@section('content')

  <body>
  <section id="container" class="">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h1><marquee behavior="" direction="">认真对待你的衣食父母!　　　　认真对待你的衣食父母!</marquee></h1>
                          </header>
                          <div class="col-lg-12"><h3>买家评论:</h3></div>
                          <div class="col-lg-12"><h5>{{$comments->content}}</h5></div>
                          <hr>
                          <!--结果页快捷搜索框 开始-->
                          <form method="post" action="{{url('admin/comment/'.$comments->id)}}">
                              {{csrf_field()}}
                              <input type="hidden" name="_method" value="put">

                              <script type="text/javascript" charset="utf-8" src="{{url('ueditor/ueditor.config.js')}}"></script>
                              <script type="text/javascript" charset="utf-8" src="{{url('ueditor/ueditor.all.min.js')}}"> </script>
                              <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
                              <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
                              <script type="text/javascript" charset="utf-8" src="{{url('ueditor/lang/zh-cn/zh-cn.js')}}"></script>

                              <script id="editor" type="text/plain" style="width:1024px;height:230px;"></script>
                              <script>
                                  var ue = UE.getEditor('editor');
                              </script>
                              <div class="col-lg-offset-2 col-lg-10">
                                  <button class="btn btn-danger" type="submit">回复</button>
                                  <button class="btn btn-default" type="button" onclick="history.go(-1)">取消</button>
                              </div>
                          </form>　　　　　　　　　　　　　　　　　


                      </section>
                  </div>
              </div>
              <!-- page end-->

      <!--main content end-->
  </section>

    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>

  </body>
@endsection
