<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Activity;
use App\http\model\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取数据
        $input = $request->input('keywords') ? $request->input('keywords'): '';
        $activity = Activity::orderBy('activity_id','asc')->where('activity_name','like','%'.$input.'%')->paginate(5);
        return view('admin.activity.list',compact('activity','input'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取数据
        $goods = Goods::get();
//        dd($goods);
        //引入一个页面
        return view('admin.activity.add',compact('goods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取数据
        $res = $request->except('_token');
//        dd($res);
//        1.添加专题
        $res['activity_gid'] = implode(',',$res['activity_gid']);
//        dd($res);
        $check = Activity::create($res);
        if ($check) {
            return redirect('admin/activity');
        } else {
            return redirect('admin/activity/create');
        }
//        2.添加专题商品



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
        //获取要修改的数据
        $activity = Activity::find($id);
        $gid = explode(',',$activity['activity_gid']);
//        dd($gid);
        $goods = Goods::get();
//        dd($activity);
        return view('admin.activity.edit',compact('activity','goods','id','gid'));
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
        //查询要删除的记录的模型
        $activity = Activity::find($id);
        //执行删除操作

        $re = $activity->delete();
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
