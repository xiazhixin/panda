@extends('layouts.admin')
@section('title', '修改类别')

@section('content')
    <body>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                        <header class="panel-heading">
                              修改类别
                        </header>
                    <div class="panel-body">
                        <div class=" form">
                            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{url('admin/cate/'.$res->id)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">

                                 <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">*类别名称:</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="cname" name="cate_name" value="{{$res->cate_name}}"minlength="2" required="" type="text">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2">类别描述:</label>
                                     <div class="col-lg-10">
                                              <textarea class="form-control " id="ccomment" name="cate_description"  required="">{{$res->cate_description}}</textarea>
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
