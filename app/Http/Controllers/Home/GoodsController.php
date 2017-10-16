<?php

namespace App\Http\Controllers\Home;

use App\http\model\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //搜索
    public function list(Request $request)
    {
        //接收数据
        $input = $request->input('keywords') ? $request->input('keywords'): '';
        $goods = Goods::orderBy('gid','asc')->where('gname','like','%'.$input.'%')->paginate(1);
//        dd($goods[3]['gid']);
        return view('home.goods.list',compact('goods','input'));
    }
}
