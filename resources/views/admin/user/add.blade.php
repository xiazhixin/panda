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
                          后台管理用户添加
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
                              <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="{{url('admin/user')}}">

                                  {{csrf_field()}}

                                  <div class="form-group ">
                                      <label for="firstname" class="control-label col-lg-2">管理员姓名</label>
                                      <div class="col-lg-10">
                                          <input class=" form-control" id="firstname" name="aname" type="text" />
                                      </div>
                                  </div>


                                  <div class="form-group ">
                                      <label for="password" class="control-label col-lg-2">密码</label>
                                      <div class="col-lg-10">
                                          <input class="form-control " id="password" name="apassword" type="password" />
                                      </div>
                                  </div>

                                  <div class="form-group ">
                                      <label for="email" class="control-label col-lg-2">邮箱</label>
                                      <div class="col-lg-10">
                                          <input class="form-control " id="email" name="aemail" type="email" />
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                      <label for="email" class="control-label col-lg-2">权限</label>
                                      <div class="col-lg-10">
                                          <select name='auth'>
                                              <option value="3">超级管理员</option>
                                              <option value="2">高级管理员</option>
                                              <option value="1">普通管理员</option>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button class="btn btn-danger" type="submit">提交&注册</button>

                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </section>
              </div>
          </div>
          <!-- page end-->

  <!--main content end-->



@endsection