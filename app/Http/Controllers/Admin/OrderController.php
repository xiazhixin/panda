<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Delivery;
use App\Http\Model\Detail;
use App\http\model\Goods;
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
        $orders = DB::table('shop_orders')->leftJoin('users','shop_orders.uid','=','users.uid')->get();

        return view('admin.order.list',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $m = Order::where('oid',$id)->update(['ostatus' => 1]);
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
        //查询出商品表,订单表,订单详情表,地址表中相关联的数据
        $orders = DB::table('shop_orders')
            ->leftJoin('shop_delivery','shop_orders.uid','=','shop_delivery.uid')
            ->leftJoin('shop_detail','shop_orders.oid','=','shop_detail.oid')
            ->leftJoin('shop_goods','shop_detail.gid','=','shop_goods.gid')
            ->select(
                'shop_orders.*','shop_delivery.*','shop_goods.gid',
                'shop_goods.gname','shop_detail.*'
            )
            ->where('shop_orders.oid',$id)
            ->get();
//        dd($orders);



        return view('admin.order.edit',compact('orders'));
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
        //获取要修改的数据
        $res = $request->except('_token','_method','oid','ocnt','ormd');
        //获取修改数据的id
        $delivery = Delivery::find($id);
        //修改
        $check = $delivery->update($res);
        if ($check) {
            return redirect('admin/order');
        } else {
            return back()->widt('msg','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
