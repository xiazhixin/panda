@extends('layouts.admin')

@section('content')
    <body>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
<header class="panel-heading">
                              修改品牌
                          </header>
                    <div class="panel-body">
                        <div class=" form">
                            <form id="goods_form" class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{url('admin/brand/'.$ids)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2" >*品牌名称:</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="cname" value="{{$brand->brand_name}}" name="brand_name" minlength="2" type="text" required />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-2" >品牌logo:</label>
                                    <div class="col-lg-10" >

                                        <input id="file_upload" name="brand_logo" type="file" multiple="true">
                                        <p><img id="img1" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="ccomment" class="control-label col-lg-2">品牌描述:</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control " id="ccomment" name="brand_description" required>{{$brand->brand_description}}</textarea>
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
                    url: "/admin/uploadBrand",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);

                        $('#img1').attr('src','/'+data);
                        $('#gpic').val(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("上传失败，请检查网络后重试");
                    }
                });
            }
        </script>
    </body>
    @endsection
