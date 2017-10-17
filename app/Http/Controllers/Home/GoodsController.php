<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Cart;
use App\Http\Model\Comment;
use App\http\model\Goods;
use App\Http\Model\HomeUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

    //详情
    public function detail($id)
    {
        $detail = Goods::find($id);
//        dd($detail->stock);
        //获取评论
        $com = DB::select('select * from shop_comment where gid ='.$id);
//        $com = Comment::orderBy('ctime','desc')->where('gid',$id)->paginate(5);

//        dd($com);
        return view('home.goods.detail',compact('detail','com','id'));
    }

    //购物车
    public function cart($id,Request $request)
    {
       $num = $request->input('num');
        //接收数据
        $good = DB::select('select * from shop_goods where gid ='.$id);
        $uid = session('user')->uid;
        $cart['gid'] = $id;
        $cart['uid'] = $uid;
        $cart['gname'] = $good[0]->gname;
        $cart['price'] = $good[0]->price;
        $cart['gpic'] = $good[0]->gpic;
        $cart['gdesc'] = $good[0]->gdesc;
        $cart['num'] = $num;
        //将商品信息存入购物车表
        $check = Cart::create($cart);
        if (!$check) {
            return view('home.goods.deatil');
        }
        //跳转到添加成功页面
//        dd($good);
        return view('home.goods.success',compact('good','num'));
    }
    
    //去购物车结算
    public function docart()
    {
        //获取用户id
        $uid = session('user')->uid;
        //从购物车表获取数据
        $carts = DB::select('select * from shop_cart where uid ='.$uid);
//        dd($carts);
        return view('home.goods.cart',compact('carts'));
    }

    public function delCartGood($id)
    {
        return 1;
        //查询要删除的记录的模型
        $cart = Cart::find($id);
        //执行删除操作
        $re = $cart->delete();
        //根据返回的结果处理成功和失败
        if($re){
            $data=[
                'status'=>0,
                'msg'=>'删除成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'删除失败'
            ];
        }
        return  $data;
    }
}
