<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Cart;
use App\Http\Model\Comment;
use App\Http\Model\Delivery;
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
        return view('home.goods.list',compact('goods','input'));
    }

    //详情
    public function detail($id)
    {
        $detail = Goods::find($id);
        //获取评论
        $com = DB::select('select * from shop_comment where gid ='.$id);
        return view('home.goods.detail',compact('detail','com','id'));
    }

    //商品加入购物车
    public function cart($id,Request $request)
    {
       $num = $request->input('num');
        //接收数据
        $good = DB::select('select * from shop_goods where gid ='.$id);
        $uid = session('user')->uid;
        //判断改建商品是否已经存在，如果存在，数量字段加num，不存在，添加全部字段
        $check = Db::select('select * from shop_cart where uid='.$uid);
//        dd($check);
        foreach ($check as $k=>$v) {
            if ($v->gid == $id) {
//                dd($id.$v->gid.'---'.$v->num.$v->gname);
                $c['num'] = ($v->num) + $num;
                $cart = Cart::find($v->id);
                $pd= $cart->update($c);
                if ($pd) {
                    return view('home.goods.success',compact('good','num'));
                }
            }
        }
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

    //删除商品
    public function delcart(Request $request,$id)
    {
        //查询要删除的记录的模型
        $cart = Cart::find($id);
        //执行删除操作
        $check = $cart->delete();
        //根据返回的结果处理成功和失败
        if($check){
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
    //修改num
    public function num(Request $request)
    {
        $res = $request->except('_token');
        //判断是否大于库存
//        dd($res['num']);
        $id = $res['id'];
//        $a['num'] = $res['num'];
//        $a['id'] = $res['id'];
        $cart = Cart::find($id);
        $check= $cart->update($res);
        if ($check) {
            return 1;
        } else {
            return 2;
        }

    }

    public function numjian(Request $request)
    {
        $res = $request->except('_token');
        if  ($res['num'] < 1) {
            return false;
        }
        $id = $res['id'];
        $cart = Cart::find($id);
        $check= $cart->update($res);
        if ($check) {
            return 1;
        } else {
            return 2;
        }

    }
    //结算
    public function pay(Request $request)
    {
        if ($request->id[0] == null) {
            return back();
        }
        $res = $request->id;
        foreach ($res as $k=>$v) {
            $pays[$v] = Cart::find($v);
        }
//        foreach ($pays as $k=>$v) {
//             $v->gname;
//        }
        $uid = session('user')->uid;
        $users = DB::select('select * from shop_delivery where uid ='.$uid);
        foreach ($users as $k=>$v) {
            if ($v->status == "1") {
                $user['rec'] = $v->rec;
                $user['tel'] = $v->tel;
                $user['addr'] = $v->addr;
            }
        }
         return view('home.goods.pay',compact('pays','user'));
    }
}
