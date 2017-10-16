@extends('layouts.admin')

@section('content')
    <body>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">

                    <div class="panel-body">
                        <div class=" form">
                            <form id="goods_form" class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{url('admin/activity/'.$id)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">*专题名称:</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="cname" name="activity_name" minlength="2" type="text" required value="{{$activity->activity_name}}" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-2">＊专题商品:</label>
                                    <div class="col-lg-10">
                                        @foreach ($goods as $k=>$v)
                                        <input class="common-text required" id="title" name="activity_gid[]" size="50" value="{{$v->gid}}" type="checkbox" 
                                        @if (in_array($v->gid,$gid))
                                        checked
                                        @endif
                                         >{{$v->gname}}
                                        @endforeach
                                    </div>
                               </div>
                                
                                <div class="form-group ">
                                    <label for="ccomment" class="control-label col-lg-2">＊专题描述:</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control " id="ccomment" name="activity_description" required placeholder="">{{$activity->activity_description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-danger" type="submit">提交</button>
                                        <button class="btn btn-default" type="button" onclick="history.go(-1)">取消</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>
    @endsection
