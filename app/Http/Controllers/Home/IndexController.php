<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Cate;
use App\http\model\Goods;
use App\http\model\Tui;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Lunbo;

class IndexController extends Controller
{
    //前台商品控制器
    public function index()
    {
        //商品
        $goods = Goods::all();
        //推荐商品(只有三个推荐位)
        $tuis = Tui::all();
        //轮播图显示
        $lunbo=Lunbo::all();
        //类别
        $cate = new Cate();
        $cates = $cate -> tree();
//        dd($cates);
        return view('home.index',compact('goods','tuis','lunbo','cates'));
    }
}
