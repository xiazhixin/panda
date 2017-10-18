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


//后台登录
Route::get('/admin/login/', 'Admin\LoginController@login');
//退出
Route::get('/admin/logout', 'Admin\IndexController@logout');
//后台生成验证码
Route::get('admin/yzm','Admin\LoginController@yzm');
//验证码路由
Route::get('/code/captcha/{tmp}','Home\LoginController@captcha');
//登录提交路由
Route::post('/admin/dologin/', 'Admin\LoginController@dologin');

//后台登录验证
//Route::group(['middleware'=>'login'],function(){

    //后台首页 登录显示路由
    Route::get('/admin/login/', 'Admin\LoginController@login');

    //登录提交路由
    Route::post('/admin/dologin/', 'Admin\LoginController@dologin');
    //    商品模块
    Route::resource('admin/goods','Admin\GoodsController');
    //    文件上传
    Route::post('admin/upload','Admin\GoodsController@upLoad');
    Route::post('admin/uploadBrand','Admin\BrandController@upLoad');
    //    推荐商品模块
    Route::resource('admin/tui','Admin\TuiController');
    //评论模块
    Route::resource('admin/comment','Admin\CommentController');

    //商品分类
    Route::resource('admin/cate','Admin\CateController');
    //添加子类
    Route::get('admin/cate/adds/{id}','Admin\AddsController@adds');
    //品牌管理
    Route::resource('admin/brand','Admin\BrandController');


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
    //修改密码页面
    Route::get('admin/repass','Admin\IndexController@repass');
    //修改密码逻辑
    Route::post('admin/dorepass','Admin\IndexController@dorepass');

    //管理后台用户
    Route::resource('admin/user', 'Admin\UserController');
    //管理前台用户
    Route::get('/admin/uindex', 'Admin\UserController@uindex');
        //修改前台用户 状态 正常、冻结
    Route::get('/admin/uupdat/{id}', 'Admin\UserController@uupdat');
      //修改
    Route::post('/admin/upget/{id}', 'Admin\UserController@upget');

    //订单列表
    Route::resource('/admin/order','Admin\OrderController');
    //网站配置
    Route::resource('/admin/config','Admin\ConfigController');
    //修改网站配置列表页提交的修改内容
    Route::post('/admin/config/changecontent','Admin\ConfigController@changeContent');
    //将config表中的配置项写入web.php文件中作为网站配置
    Route::get('/admin/putfile','Admin\ConfigController@putFile');
    //活动管理
    Route::resource('admin/activity','Admin\ActivityController');
    //反馈意见管理
    Route::resource('admin/back','Admin\BackController');
    
//});


        /*----------------------------------------厉害的分割线------------------------------------------------------------*/
        //前台登录显示
        Route::get('/home/login/', 'Home\LoginController@login');
        //前台注册
        Route::get('/home/register1', 'Home\LoginController@register1');
        //前台执行注册路由
        Route::post('/home/doregister/', 'Home\LoginController@doregister');
            //前台注册手机验证码路由
        Route::post('sendcode1', 'Home\LoginController@sendcode1');

        //前台登录
        Route::post('/home/dologin', 'Home\LoginController@dologin');
        //前台验证码
        Route::get('/code/captcha/{tmp}', 'Home\LoginController@captcha');

        //ajax 注册验证用户是否存在路由
        Route::get('home/ajax', 'Home\LoginController@ajax');
        //前台退出
        Route::get('/home/outlog', 'Home\LoginController@outlog');
        //前台首页
        Route::get('/', 'Home\IndexController@index');
        //订单页
        Route::resource('home/order', 'Home\OrderController');
        //商品列表
        Route::get('home/list','Home\GoodsController@list');
        //商品详情
        Route::get('home/detail/{id}','Home\GoodsController@detail');
        //加入购物车
        Route::get('home/cart/{id}','Home\GoodsController@cart');
        //去购物车结算
        Route::get('home/docart','Home\GoodsController@docart');
        //修改购物车商品数量
        Route::post('home/num','Home\GoodsController@num');
        Route::post('home/numjian','Home\GoodsController@numjian');
        //结算
        Route::post('home/pay','Home\GoodsController@pay');
        //删除商品
        Route::post('home/delcart/{id}','Home\GoodsController@delcart');
         //轮播图路由
        Route::resource('/admin/lunbo','Admin\LunboController');

        //轮播图片地址写入路由
        Route::post('/admin/but','Admin\LunboController@but');
        //商品评论
        Route::resource('/home/comment','Home\CommentController');

        //个人中心
        Route::get('/home/center','Home\CenterController@index');
        //个人信息
        Route::get('home/center/information','Home\CenterController@information');
        //修改个人信息
        Route::post('/home/center/update/{id}','Home\CenterController@update');
        //修改上传头像
        Route::post('/home/center/upload','Home\CenterController@upload');
        //收货地址
        Route::get('/home/address','Home\AddressController@index');
        //修改默认地址
        Route::get('/home/address/status/{id}','Home\AddressController@status');
        //删除地址
        Route::get('/home/address/{id}','Home\AddressController@del');
        //修改地址
        Route::get('/home/address/{id}/edit','Home\AddressController@edit');
        //新增收货地址
        Route::get('/home/address/create','Home\AddressController@create');
        //保存新增收货地址
        Route::post('/home/address/store/{id}','Home\AddressController@store');
