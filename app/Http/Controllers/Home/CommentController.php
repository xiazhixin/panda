<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Comment;
use App\Http\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       //获取订单号
        $input=[];
        $input['oid']=$request->input('oid');
        //获取评论内容
       $comment = $request->except('_token','oid');
       //dd($comment);
       $com = Comment::create($comment);

       //如果修改成功则同时修改订单中的状态
        if($com){
            Order::where('oid',$input['oid'])->update(['ostatus' => 4]);
            return back()->with('err','评论成功！');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $com = DB::table('shop_orders')
                ->leftJoin('shop_detail','shop_orders.oid','=','shop_detail.oid')
                ->leftJoin('shop_goods','shop_goods.gid','=','shop_detail.gid')
                ->where('shop_orders.uid',1)
                ->where('shop_orders.ostatus',2)
                ->get();
//        dd($com);
        return view('home.comment.commentlist',compact('com'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
