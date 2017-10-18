@extends('layouts.admin')

@section('content')
<style>
  #render{
    float: right;
  }
</style>
  <body>
  <section id="container" class="">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              品牌列表
                          </header>
                          <!--结果页快捷搜索框 开始-->
                          <div class="search_wrap" style="margin:20px;">
                              <form action="{{url('admin/brand')}}" method="get">
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
					                <th>id</th>
					                <th>品牌名称</th>
					                <th>品牌描述</th>
					                <th>品牌logo</th>
					                <th>操作</th>
					            </tr>
                              </thead>
                              <tbody>

                            @foreach ($brands as $k=>$v)
					            <tr>
					                <td>{{$v->brand_id}}</td>
					                <td>{{$v->brand_name}}</td>
					                <td>{{$v->brand_description}}</td>
					                <td><p><img  src="{{$v->brand_logo}}" id="" alt=""  style="max-width:350px;max-height:100px;" /></p>{{$v->brand_logo}}</td>
              {{-- <td>{{$cates[$v->brand_cate_id][0]->cate_name}}</td> --}}
					                <td>
					                  <a href="{{url('admin/brand/'.$v->brand_id.'/edit')}}">修改</a> |
					                  <a href="javascript:;" onclick="delBrand({{$v->brand_id}})">删除</a>
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
      <div id="render" class="page_list">
          {!! $brands->render() !!}
      </div>
      <!--main content end-->
  </section>

    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>

  <script>
      function delBrand(id){
          //询问框
          layer.confirm('确认删除？', {
              btn: ['确认','取消']
          }, function(){
              $.post("{{url('admin/brand/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
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
