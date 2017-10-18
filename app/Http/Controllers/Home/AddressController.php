<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{

    public function index()
    {
        //分配地址到模板
        $id = session('user')->uid;
        $address = DB::table('shop_delivery')
                    ->where('uid',$id)
                    ->get();
//        dd($address);
        return view('home.address.address',compact('address'));
    }
    public function status($id)
    {
        //修改默认地址
        $res = Delivery::where('id',$id)->update(['status'=>0]);
        $uid = session('user')->uid;
        if(!empty($res)) {
            Delivery::where([['uid',$uid],['id','!=',$id]])->update(['status' => 1]);
            return back()->with('errors','默认地址已设置！');
        }else{
            return back()->with('errors','设置失败！');
        }
    }
    public function del($id)
    {
        //删除地址
        $res =  Delivery::where('id',$id)->first()->delete();
        // 判断返回结果
        if(!empty($res)) {
            return back()->with('errors','删除成功！');
        }
        return back()->with('errors','删除失败！');
    }
    public function edit($id)
    {
        //修改地址
        $addr = Delivery::where('id',$id)->get();

        return view('home.address.edit',compact('addr'));
    }
//    public function store(Request $request,$id)
//    {
//        //保存新增收货人
//        $input = $request ->except('_token');
////        $input
//        dd($input);
//    }
}
