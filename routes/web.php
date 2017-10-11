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

//后台登录验证
//Route::group(['middleware'=>'login'],function(){
    //    商品模块
    Route::resource('admin/goods','Admin\GoodsController');
    //    文件上传
    Route::post('admin/upload','Admin\GoodsController@upLoad');
    //    推荐商品模块
    Route::resource('admin/tui','Admin\TuiController');

    //商品分类
    Route::resource('admin/cate','Admin\CateController');

    //添加子类
    Route::get('admin/cate/adds/{id}','Admin\AddsController@adds');



    //后台首页 登录显示路由
        Route::get('/admin/login/', 'Admin\LoginController@login');

    //登录提交路由
        Route::post('/admin/dologin/', 'Admin\LoginController@dologin');



    //后台生成验证码
    Route::get('admin/yzm','Admin\LoginController@yzm');
    //验证码路由
    Route::get('/code/captcha/{tmp}', 'Home\LoginController@captcha');
    //登录
        Route::get('/admin/index', 'Admin\IndexController@index');
    //退出
        Route::get('/admin/logout', 'Admin\IndexController@logout');

    //修改密码

    //后台用户
        Route::resource('admin/user', 'Admin\UserController');
//})

        /*----------------------------------------厉害的分割线------------------------------------------------------------*/
        //前台登录显示
        Route::get('/home/login/', 'Home\LoginController@login');
        //前台注册
        Route::get('/home/register/', 'Home\LoginController@register');

        Route::post('/home/doregister/', 'Home\LoginController@doregister');

        //前台首页
        Route::get('home/index', 'Home\IndexController@index');