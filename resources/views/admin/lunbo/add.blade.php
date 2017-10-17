<!-- 后台首页 -->
<!-- 样式路径"{{asset('admin/style/xxxxxxxxxxxxx')}}" -->
@section('title', '首页')
@extends('layouts.admin')
@section('content')

          <!-- page start-->


          <div class="row">
              <div class="col-lg-12">
                  <section class="panel">
                      <header class="panel-heading">
                          轮播图添加
                      </header>
                      <div class="panel-body">
                          @if (count($errors) > 0)
                              <div class="alert alert-danger">
                                  <ul>
                                      @if(is_object($errors))
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      @else
                                          <li>{{ $errors }}</li>
                                      @endif
                                  </ul>
                              </div>
                          @endif
                          <div class="form">
                              <form  id="art_form" class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="{{url('admin/but')}}" enctype="multipart/form-data">

                                  {{csrf_field()}}

                                  <div class="form-group ">
                                      <label for="firstname" class="control-label col-lg-2">轮播昵称</label>
                                      <div class="col-lg-10">
                                          <input class=" form-control" id="firstname" name="lname" type="text"  />
                                      </div>
                                  </div>


                                  <div class="form-group ">
                                      <label for="img" class="control-label col-lg-2">缩略图</label>
                                      <div class="col-lg-10">
                                          <input type="text" size="50" name="art_thumb" id="art_thumb">
                                          <input id="file_upload" name="file_upload" type="file" multiple="true">
                                          <p><img id="img1" alt="上传后显示图片"  style="max-width:350px;max-height:100px;" /></p>
                                      </div>
                                  </div>



                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button class="btn btn-danger" type="submit" onclick="onbut();">上传</button>

                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </section>
              </div>
          </div>
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
                  var formData = new FormData($('#art_form')[0]);
                  $.ajax({
                      type: "POST",
                      url: "/admin/lunbo",
                      data: formData,
                      contentType: false,
                      processData: false,
                      success: function(data){
                   //$('#img1').attr('src','http://lamp189.oss-cn-shanghai.aliyuncs.com/'+data);
                   $('#img1').attr('src','http://xm-panda.oss-cn-beijing.aliyuncs.com/'+data);

//
                          $('#art_thumb').val(data);

                      },
                      error: function(XMLHttpRequest, textStatus, errorThrown) {
                          alert("上传失败，请检查网络后重试");
                      }
                  });
              }

          </script>
          <!-- page end-->

  <!--main content end-->



@endsection