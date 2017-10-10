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
//    商品模块路由
Route::resource('admin/goods','Admin\GoodsController');
//    文件上传路由
Route::post('admin/upload','Admin\GoodsController@upLoad');