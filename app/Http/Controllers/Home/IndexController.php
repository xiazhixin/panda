<?php

namespace App\Http\Controllers\Home;

use App\http\model\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //前台商品控制器
    public function index()
    {
        //商品
        $goods = Goods::orderBy('gid','desc')->take(20);
        //其他网站配置需要分配
        return view('home.index',compact('goods'));
    }
}
