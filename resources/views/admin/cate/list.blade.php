@extends('layouts.admin')
@section('title', '浏览类别')

@section('content')
  <style>
    .col-sm-6 {
      width:100%;
    }
    .cate{
      background:#E6E6Fa;
    }
   </style>
  <div class="col-sm-6">
    <section class="panel">
        <header class="panel-heading">
            浏览类别
        </header>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>id</th>
                <th>分类</th>
                <th>层级</th>
                <th>描述</th>
                <th>pid</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cates as $k=>$v)
            <tr
          	@if ($v->cate_pid == 0) 
                 class='cate'
            
            @endif
            >
                <td>{{$v->id}}</td>
                <td>{{str_repeat("　",2*$v->lev).'|--'.$v->cate_name}}</td>
                <td>{{($v->lev+1).'级类'}}</td>
                <td>{{$v->cate_description}}</td>
                <td>{{$v->cate_pid}}</td>
                <td>
                  <a href="{{url('admin/cate/'.$v->id.'/edit')}}">修改</a> |
                  <a href="{{url('admin/cate/adds/'.$v->id)}}">添加子类</a> |
                  <a href="javascript:;" onclick="delCate({{$v->id}})">删除</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</div>
<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
<script>
    function delCate(id){
	    layer.confirm('是否删除?', {icon: 3, title:'提示'}, function(index){
			$.post("{{url('admin/cate/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
			        if(data == 0){
			            location.href = location.href;
			            layer.msg('删除成功', {icon: 6});
			        } else {
			            layer.alert('该类下面有子类,不能删除', {
						  icon: 4,
						  skin: 'layer-ext-moon' 
						})
			        }
			    })
		});
    }
</script>
@endsection