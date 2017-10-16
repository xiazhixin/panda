<!-- 后台首页 -->
@extends('layouts.admin')
@section('title', '首页')

@section('content')
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                订单列表
            </header>
            <table class="table table-striped table-advance table-hover">
                <thead>
                <tr>

                    <th class="hidden-phone"><i class="icon-question-sign"></i>订单号</th>
                    <th><i class="icon-bookmark"></i> 买家</th>
                    <th><i class=" icon-edit"></i>下单时间</th>
                    <th><i class=" icon-edit"></i> 订单状态</th>
                    <th><i class=" icon-edit"></i> 联系电话</th>
                    <th><i class=" icon-edit"></i> 操作</th>

                </tr>
                </thead>
                <tbody>
                {{csrf_field()}}

            @foreach($orders as $k=>$v)

                <tr>
                    <td>{{$v->oid}}</td>

                    <td>
                        <a href="#">{{$v->uname}}</a>
                    </td>

                    <td>
                        <a href="#">{{$v->otime}}</a>
                    </td>
                    <td>
                        @if($v->ostatus == '0')
                            <a href="#">未发货</a>
                        @elseif($v->ostatus == '1')
                            <a href="#">已发货</a>
                        @elseif($v->ostatus == '2')
                            <a href="#">订单完成</a>
                        @endif
                    </td>
                    <td>
                        <a href="#">{{$v->tel}}</a>
                    </td>
                    <td>
                            <a href="{{url('admin/order/'.$v->oid.'/edit')}}" ,return false><button class="btn btn-primary btn-xs">订单详情</button></a>
                        @if($v->ostatus == '0')
                            <div class="btn btn-primary btn-xs">
                                <a href="javascript:;" onclick="shipments({{$v->oid}})">发货出库</a></div>
                        @elseif($v->ostatus == '4')
                            <div class="btn btn-primary btn-xs">
                                <a href="">已完成</a></div>
                        @endif
{{--                        <a href="javascript:;" onclick="delArt({{$v->conf_id}})"><button class="btn btn-danger btn-xs"></button></a>--}}
                    </td>
                </tr>

                @endforeach
                </tbody>
                <script>

                    function shipments(oid) {
                        layer.confirm('是否发货出库？', {
                            btn: ['确认', '返回'] //按钮
                        }, function (index) {
                            layer.close(index);
                            location.href = ("{{ url('/admin/order') }}/" + oid);
                        }, function () {

                        });
                    }

                </script>



            </table>

        </section>
    </div>

@endsection