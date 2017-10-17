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
                          前台管理用户状态
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
                              <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="{{url('admin/upget/'.$user->uid)}}">

                                  {{csrf_field()}}

                                  <div class="form-group ">
                                      <label for="firstname" class="control-label col-lg-2">用户账号</label>
                                      <div class="col-lg-10">{{$user->uname}}
                                          <input type="hidden" name="uname" value="{{$user->uname}}">
                                      </div>
                                  </div>


                                  <div class="form-group ">
                                      <label for="password" class="control-label col-lg-2">邮箱</label>
                                      <div class="col-lg-10">
                                          {{$user->email}}
                                          <input type="hidden" name="email" value="{{$user->email}}">
                                      </div>
                                  </div>

                                  <div class="form-group ">
                                      <label for="email" class="control-label col-lg-2">电话</label>
                                      <div class="col-lg-10">
                                          <input type="hidden" name="tel" value="{{$user->tel}}">
                                          {{$user->tel}}
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                      <label for="email" class="control-label col-lg-2">权限</label>
                                      <div class="col-lg-10">
                                          <select name='status'>
                                              <option value='0' @if ($user->status == 0) selected @endif>正常状态</option>
                                              <option value='1' @if ($user->status == 1) selected @endif>冻结状态</option>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button class="btn btn-danger" type="submit">提交状态</button>

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