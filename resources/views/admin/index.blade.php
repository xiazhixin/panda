<!-- 后台首页 -->
@extends('layouts.admin')
@section('title', '首页')
@section('content')
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

  <div class="row">
                  <div class="col-lg-4">
                      <!--user info table start-->
                      <section class="panel">
                          <div class="panel-body">
                              <a href="#" class="task-thumb">
                                  <img src="{{asset('admin/style/img/avatar1.jpg')}}" alt="">
                              </a>
                              <div class="task-thumb-details">
                                  <h1><a href="#">Anjelina Joli</a></h1>
                                  <p>Senior Architect</p>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                                <tr>
                                    <td>
                                        <i class=" icon-tasks"></i>
                                    </td>
                                    <td>New Task Issued</td>
                                    <td> 02</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="icon-warning-sign"></i>
                                    </td>
                                    <td>Task Pending</td>
                                    <td> 14</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="icon-envelope"></i>
                                    </td>
                                    <td>Inbox</td>
                                    <td> 45</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class=" icon-bell-alt"></i>
                                    </td>
                                    <td>New Notification</td>
                                    <td> 09</td>
                                </tr>
                              </tbody>
                          </table>
                      </section>
                      <!--user info table end-->
                  </div>
                  <div class="col-lg-8">
                      <!--work progress start-->
                      <section class="panel">
                          <div class="panel-body progress-panel">
                              <div class="task-progress">
                                  <h1>Work Progress</h1>
                                  <p>Anjelina Joli</p>
                              </div>
                              <div class="task-option">
                                  <select class="styled hasCustomSelect" style="width: 112px; position: absolute; opacity: 0; height: 38px; font-size: 12px;">
                                      <option>Anjelina Joli</option>
                                      <option>Tom Crouse</option>
                                      <option>Jhon Due</option>
                                  </select><span class="customSelect styled" style="display: inline-block;"><span class="customSelectInner" style="width: 91px; display: inline-block;">Anjelina Joli</span></span>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>
                                      Target Sell
                                  </td>
                                  <td>
                                      <span class="badge bg-important">75%</span>
                                  </td>
                                  <td>
                                    <div id="work-progress1"><canvas style="display: inline-block; width: 47px; height: 20px; vertical-align: top;" width="47" height="20"></canvas></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>
                                      Product Delivery
                                  </td>
                                  <td>
                                      <span class="badge bg-success">43%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress2"><canvas style="display: inline-block; width: 47px; height: 22px; vertical-align: top;" width="47" height="22"></canvas></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>
                                      Payment Collection
                                  </td>
                                  <td>
                                      <span class="badge bg-info">67%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress3"><canvas style="display: inline-block; width: 47px; height: 22px; vertical-align: top;" width="47" height="22"></canvas></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td>
                                      Work Progress
                                  </td>
                                  <td>
                                      <span class="badge bg-warning">30%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress4"><canvas style="display: inline-block; width: 47px; height: 22px; vertical-align: top;" width="47" height="22"></canvas></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>5</td>
                                  <td>
                                      Delivery Pending
                                  </td>
                                  <td>
                                      <span class="badge bg-primary">15%</span>
                                  </td>
                                  <td>
                                      <div id="work-progress5"><canvas style="display: inline-block; width: 47px; height: 22px; vertical-align: top;" width="47" height="22"></canvas></div>
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </section>
                      <!--work progress end-->
                  </div>
              </div>
        
      
  </div>
@endsection