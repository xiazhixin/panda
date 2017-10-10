<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::group(['middleware'=>'isLogin'],function () {
//后台首页 登录显示路由
    Route::get('/admin/login/', 'Admin\LoginController@login');

//登录提交路由
    Route::post('/admin/dologin/', 'Admin\LoginController@dologin');


//验证码路由
    Route::get('/code/captcha/{tmp}', 'Admin\LoginController@captcha');
//登入
    Route::get('/admin/index', 'Admin\IndexController@index');
//退出
    Route::get('/admin/logout', 'Admin\IndexController@logout');

//修改密码

//后台用户资源路由
    Route::resource('admin/user', 'Admin\UserController');


    /*----------------------------------------厉害的分割线------------------------------------------------------------*/
    //前太登录显示路由
    Route::get('/home/login/', 'Home\LoginController@login');
    //前台注册路由
    Route::get('/home/register/', 'Home\LoginController@register');

    Route::post('/home/doregister/', 'Home\LoginController@doregister');
    //});





























