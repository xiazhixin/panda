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


//后台首页
Route::get('/admin/index/', function () {
    return view('admin.index');
});

//网站配置
Route::resource('/admin/config','Admin\ConfigController');
//修改网站配置列表页提交的修改内容
Route::post('/admin/config/changecontent','Admin\ConfigController@changeContent');

