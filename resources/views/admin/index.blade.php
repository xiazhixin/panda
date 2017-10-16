<!-- 后台首页 -->

@section('title', '首页')
@extends('layouts.admin')
@section('content')
    <h1>欢迎登陆网站后台管理中心</h1>
  <!--state overview start-->
  <div class="row state-overview">
      <div class="col-lg-3 col-sm-6">
          <section class="panel">
              <div class="symbol terques">
                  <i class="icon-user"></i>
              </div>
              <div class="value">
                  <h1>22</h1>
                  <p>新用户</p>
              </div>
          </section>
      </div>
      <div class="col-lg-3 col-sm-6">
          <section class="panel">
              <div class="symbol red">
                  <i class="icon-tags"></i>
              </div>
              <div class="value">
                  <h1>140</h1>
                  <p>新反馈</p>
              </div>
          </section>
      </div>
      <div class="col-lg-3 col-sm-6">
          <section class="panel">
              <div class="symbol yellow">
                  <i class="icon-shopping-cart"></i>
              </div>
              <div class="value">
                  <h1>345</h1>
                  <p>销售</p>
              </div>
          </section>
      </div>
      <div class="col-lg-3 col-sm-6">
          <section class="panel">
              <div class="symbol blue">
                  <i class="icon-bar-chart"></i>
              </div>
              <div class="value">
                  <h1>34,500</h1>
                  <p>售出总额</p>
              </div>
          </section>
      </div>
  </div>
  <!--state overview end-->


        
      
  </div>
@endsection