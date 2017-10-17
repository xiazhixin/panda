<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $res = Delivery::where('id',$id)->update(['status'=>1]);
        $uid = session('user')->uid;
        if(!empty($res)) {
            Delivery::where([['uid',$uid],['id','!=',$id]])->update(['status' => 0]);
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
//        dd($addr);
        return view('home.address.edit',compact('addr'));
    }
    public function update(Request $request,$id)
    {
        //保存修改的收货人
        $input = $request ->except('_token');
        $rule=[
            'tel'=>'required',
        ];
        $msg = [
            'tel.required'=>'电话号码必须输入!',
        ];
        //手动验证表单
        $validator = Validator::make($request->all(),$rule,$msg);
        if ($validator->fails()) {
            return redirect('home/address/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        //修改
        $oldrec = Delivery::find($id);
        $res = $oldrec -> update($input);
        if($res){
            return redirect('home/address');
        }else{
            return back()->with('errors','修改失败');
        }
    }
    public function store(Request $request)
    {
        //保存新增加的收货人
        $input = $request ->except('_token');
        $rule=[
            'tel'=>'required',
        ];
        $msg = [
            'tel.required'=>'电话号码必须输入!',
        ];
        //手动验证表单
        $validator = Validator::make($request->all(),$rule,$msg);
        if ($validator->fails()) {
            return redirect('home/address')
                ->withErrors($validator)
                ->withInput();
        }
        $res = Delivery::create($input);
        if($res){
            return redirect('home/address');
        }else{
            return back()->with('errors','添加失败');
        }
    }

}
