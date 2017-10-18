<?php

namespace App\Http\Controllers\Admin;

use App\http\model\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $input = $request->input('keywords') ? $request->input('keywords'): '';
        $comments = Comment::orderBy('id','desc')->where('gname','like','%'.$input.'%')->paginate(10);
//        dd($comments);
        $goods = DB::table('shop_goods')->where('shop_goods.gname','=','shop_comment.gname')->get();
        return view('admin.comment.list',compact('comments','goods'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comments = DB::table('shop_comment')->find($id);
        return view('admin.comment.reply',compact('comments'));
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
        $comments =  Comment::find($id);
//       获取商品要修改的值

        $input = $request->except('_token','_method');
        //执行修改方法
        $re = $comments->update($input);
        if($re){
            return redirect('admin/comment');
        }else{
            return back()->with('msg','修改失败');
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
        //
    }
}
