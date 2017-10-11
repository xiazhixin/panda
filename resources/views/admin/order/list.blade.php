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
                    <th><i class="icon-bookmark"></i> 收货人</th>
                    <th><i class=" icon-edit"></i>下单时间</th>
                    <th><i class=" icon-edit"></i> 订单状态</th>
                    <th><i class=" icon-edit"></i> 联系电话</th>
                    <th><i class=" icon-edit"></i> 操作</th>

                </tr>
                </thead>
                <tbody>
                {{csrf_field()}}

            @foreach($list as $k=>$v)
                <tr>
                    <td>{{$v->oid}}</td>
                    <td class="hidden-phone">
                        <a href="#">{{$v->uid}}</a>
                    </td>
                    <td>
                        <a href="#">{{$v->otime}}</a>
                    </td>
                    <td>

                        <a href="#">{{$v->status}}</a>
                    </td>
                    <td>
                        <a href="#">123434</a>
                    </td>
                    <td>
                            <a href="{{url('admin/order/'.$v->oid.'/edit')}}" ,return false><button class="btn btn-primary btn-xs">订单详情</button></a>
{{--                        <a href="javascript:;" onclick="delArt({{$v->conf_id}})"><button class="btn btn-danger btn-xs"></button></a>--}}
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>

        </section>
    </div>

@endsection