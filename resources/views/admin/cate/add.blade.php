@extends('layouts.admin')
@section('title', '添加类别')

@section('content')
    <body>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                        <header class="panel-heading">
                              添加类别
                        </header>
                    <div class="panel-body">
                        <div class=" form">
                            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{url('admin/cate')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">*分类:</label>
                                    <div class="col-lg-10">
                                       <select name="cate_pid">

                                                <option value="0">==顶级分类==</option>
                                                @foreach($cates as $v)
                                                <option value="{{$v->id}}">{{str_repeat("　",2*$v->lev).'|--'.$v->cate_name}}</option>
                                                @endforeach
                                              </select>
                                    </div>
                                </div>
                                 <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">*类别名称:</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="cname" name="cate_name" minlength="2" required="" type="text">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2">类别描述:</label>
                                     <div class="col-lg-10">
                                              <textarea class="form-control " id="ccomment" name="cate_description" required=""></textarea>
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
