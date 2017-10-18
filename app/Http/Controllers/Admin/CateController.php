<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //查询所有数据
        $cate = new Cate();
        $cates = $cate->tree();
        //引入一个页面
        return view('admin.cate.list',compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //查询所有数据
        $cate = new Cate();
        $cates = $cate->tree();
        //引入一个页面
        return view('admin.cate.add',compact('cates'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据
        $res = $request->except('_token');
//        dd($res);
        $cate = new Cate();
        $cate->cate_name = $res['cate_name'];
        $cate->cate_pid = $res['cate_pid'];
        $cate->cate_description = $res['cate_description'];
        $check = $cate->save();
        if ($check) {
            return redirect('admin/cate');
        } else {
            return redirect('admin/cate/create')->with('msg','添加失败');
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
        //接收数据
        $res = Cate::find($id);
//        dd($res);
        $cate = new Cate();
        $cates = $cate->tree();
        //显示一个页面
        return view('admin.cate.edit',compact('res','cates'));
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
        //接收数据
        $res = $request->except('_token','_method');
//        dd($res);
        $cate = Cate::find($id);
        $cate->cate_name = $res['cate_name'];
        $cate->cate_description = $res['cate_description'];
        $check = $cate->save();
        if ($check) {
            return redirect('admin/cate/');
        } else {
            return redirect('admin/cate/'.$id.'/edit')->with('msg','修改失败');
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
        //判断该类下是否有子类
//        $check = Cate::where('cate_pid','=',$id)->get();
        $check =  DB::select('select * from shop_cate where cate_pid ='.$id);
//        $check = DB::table('shop_cate')->where('cate_pid', '=', $id)->get();
        if ($check) {
            return  1;

            exit;
        }
        //查询要删除记录的模型
        $cate = Cate::find($id);
        $checks = $cate->delete();
        if ($checks) {
            return 0;
        } else {
            return 2;
        }

    }


}
