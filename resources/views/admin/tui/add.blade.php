@extends('layouts.admin')
@section('title','添加推荐商品')
@section('content')
    <body>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">

                    <div class="panel-body">
                        <div class=" form">
                            <form id="goods_form" class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{url('admin/tui')}}" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">*商品名称:</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="cname" name="gname" minlength="2" type="text" required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-2">商品价格:</label>
                                    <div class="col-lg-10">
                                        <input class="form-control " id="cemail" type="text" name="price" required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-2">库　　存:</label>
                                    <div class="col-lg-10">
                                        <input class="form-control " id="curl" type="text" name="stock" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-2">缩 略 图:</label>
                                    <div class="col-lg-10" >

                                        <input type="hidden" size="50" name="gpic" id="art_thumb">
                                        <input id="file_upload" name="file_upload" type="file" multiple="true">
                                        <p><img id="img1" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="ccomment" class="control-label col-lg-2">商品描述:</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control " id="ccomment" name="gdesc" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">*关键字描述:</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="cname" name="keyword" minlength="2" type="text" required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-2">状　　态:</label>
                                    <div class="col-lg-10">
                                        <input class="common-text required" id="title" name="status" size="50" value="1" type="radio" checked >新品
                                        <input class="common-text required" id="title" name="status" size="50" value="2" type="radio">上架
                                        <input class="common-text required" id="title" name="status" size="50" value="3" type="radio">下架
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
        <!-- page end-->
        <script type="text/javascript">
            $(function () {
                $("#file_upload").change(function () {
                    //alert(1111);
                    uploadImage();
                })
            })
            function uploadImage() {
                //  判断是否有选择上传文件
                var imgPath = $("#file_upload").val();
                if (imgPath == "") {
                    alert("请选择上传图片！");
                    return;
                }
                //判断上传文件的后缀名
                var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                if (strExtension != 'jpg' && strExtension != 'gif'
                    && strExtension != 'png' && strExtension != 'bmp') {
                    alert("请选择图片文件");
                    return;
                }
                var formData = new FormData($('#goods_form')[0]);
                $.ajax({
                    type: "POST",
                    url: "/admin/upload",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {

                        $('#img1').attr('src','/'+data);
                        $('#gpic').val(data);
                        $('#art_thumb').val(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("上传失败，请检查网络后重试");
                    }
                });
            }
        </script>
    </body>
    @endsection
