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

                          后台管理用户修改

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
                              <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="{{url('admin/user/'.$user->aid)}}">

                                  {{csrf_field()}}
                                  <input type="hidden" name="_method" value="put">
                                  <div class="form-group ">
                                      <label for="firstname" class="control-label col-lg-2">管理员姓名</label>
                                      <div class="col-lg-10">
                                          <input class=" form-control" id="firstname" name="aname" type="text"  value="{{$user->aname}}"/>
                                      </div>
                                  </div>




                                  <div class="form-group ">
                                      <label for="email" class="control-label col-lg-2">邮箱</label>
                                      <div class="col-lg-10">
                                          <input class="form-control " id="email" name="aemail" type="email" value="{{$user->aemail}}" />
                                      </div>
                                  </div>

                                  <div class="form-group ">
                                      <label for="email" class="control-label col-lg-2">权限</label>
                                      <div class="col-lg-10">
                                          <select name='auth'>

                                              <option value='1' @if ($user->auth == 3) selected @endif>超级管理员</option>
                                              <option value='2' @if ($user->auth == 2) selected @endif>高级管理员</option>
                                              <option value='3' @if ($user->auth == 1) selected @endif>普通管理员</option>
                                          </select>
                                      </div>
                                  </div>


                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <a href=""> <button class="btn btn-danger" type="submit">提交&修改</button></a>


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