<!-- 后台首页 -->
@extends('layouts.admin')
@section('title', '首页')

@section('content')
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                修改订单
            </header>
            @foreach($orders as $k=>$v)
            <div class="panel-body">

                <form method="post" class="form-horizontal tasi-form" action="{{url('admin/order/'.$v->uid)}}">
                    <input name="_method" value="put" type="hidden">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><i style="color:red">*</i>订单编号</label>
                        <div class="col-sm-5">
                            <input  readonly class="form-control" name="oid" type="text" value="{{$v->oid}}">

                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label"><i style="color:red">*</i>收货人</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="rec" type="text" value="{{$v->rec}}">

                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><i style="color:red">*</i>联系电话</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="tel" type="text" value="{{$v->tel}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><i style="color:red">*</i>收货地址</label>
                        <div class="col-sm-5">

                            <input class="form-control" name="addr" type="text" value="{{$v->addr}}">

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label"><i style="color:red">*</i>总数量</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="ocnt" type="text" readonly value="{{$v->ocnt}}" >
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label"> <i style="color:red">*</i>总金额</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="ormd" type="text" readonly value="{{$v->ormd}}">
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="inputSuccess" class=" col-sm-2"></label>
                        <button class="btn btn-primary col-sm-1" type="submit">修改订单</button>
                        <a onclick="history.go(-1)" return false class="btn btn-default col-sm-1" type="submit" style="margin-left:20px">返回</a>

                    </div>


                </form>

            </div>
        </section>
    </div>
        <div class="col-lg-12">
            <section class="panel">

                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th> 商品编号</th>
                        <th> 商品名称</th>
                        <th>商品图片</th>
                        <th>购买数量</th>
                        <th>定价</th>
                        <th>小计</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$v->gid}}</td>
                        <td>{{$v->gname}}</td>
                        <td>图片路径</td>
                        <td>{{$v->dcnt}}</td>
                        <td>{{$v->price}}</td>
                        <td>{{$v->dcnt*$v->price}}</td>
                    </tr>
                    </tbody>
                </table>
            </section>
        </div>

    @endforeach



@endsection