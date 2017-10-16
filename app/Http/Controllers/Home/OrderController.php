<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\HomeUser;
use App\Http\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //判断是否登录
        if(empty(session('user'))){
            return view("home.login");
        }
        //查询出与用户相对应得订单
        $id = session('user')->id;
        $orders = DB::table('shop_orders')
            ->leftJoin('users','shop_orders.uid','=','users.uid')
            ->leftJoin('shop_detail','shop_orders.oid','=','shop_detail.oid')
            ->leftJoin('shop_goods','shop_detail.gid','=','shop_goods.gid')
            ->where('users.uid',$id)
            ->get();

        return view('home.order.order',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $m = Order::where('oid',$id)->update(['ostatus' => 2]);
        if(!empty($m)) {
            return back()->with('err','已确认！');
        }
        return back()->with('err','确认收货失败！');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $up = Order::where('oid',$id)->update(['ostatus' => 5]);
        if($up){
            $data=[
                'status'=>5,
                'msg'=>'修改成功'
            ];
        }else{
            $data=[
                'status'=>0,
                'msg'=>'修改失败'
            ];
        }
        return $data;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Order::where('oid',$id)->delete();
        if($del){
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
        return $data;

    }
}
