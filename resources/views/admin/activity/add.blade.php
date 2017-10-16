@extends('layouts.admin')

@section('content')
    <body>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">

                    <div class="panel-body">
                        <div class=" form">
                            <form id="goods_form" class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{url('admin/activity')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-2">*专题名称:</label>
                                    <div class="col-lg-10">
                                        <input class=" form-control" id="cname" name="activity_name" minlength="2" type="text" required value="" />
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-2">＊专题商品:</label>
                                    <div class="col-lg-10">
                                        @foreach ($goods as $k=>$v)
                                        <input class="common-text required" id="title" name="activity_gid[]" size="50" value="{{$v->gid}}" type="checkbox"  >{{$v->gname}}
                                        @endforeach
                                    </div>
                               </div>
                                
                                <div class="form-group ">
                                    <label for="ccomment" class="control-label col-lg-2">＊专题描述:</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control " id="ccomment" name="activity_description" required placeholder=""></textarea>
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
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("上传失败，请检查网络后重试");
                    }
                });
            }
        </script>
    </body>
    @endsection
