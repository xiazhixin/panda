<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\http\model\Tui;
use Illuminate\Support\Facades\Input;



class TuiController extends Controller
{
    /**
     * xia
     * 商品控制器
     * 2017-10-9
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //文件上传方法
    public function upLoad(Request $request)
    {
        //实现     获取上传的文件对象
        $file = $request->file('file_upload');
        //dd($file);
        //判断文件是否有效
        if ($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
            // 1将文件上传到本地服务器
            $path = $file->move(public_path() . '/uploads', $newName);

            $filepath = 'uploads/' . $newName;
            //返回文件的路径
//            dd($filepath);
            return $filepath;
        }
    }

    public function index()
    {
        //显示商品列表
        $goods = Tui::orderBy('gid','asc')->paginate(5);
        $goods->status = [1=>'新品','上架','下架'];
        return view('admin.tui.list',compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加商品模板

        return view('admin.tui.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收添加的商品并保存
        $input = $request->except('_token','file_upload');

        $re =Tui::create($input);
        if($re){
            return redirect('admin/tui');
        }else{
            return redirect('admin/tui/create');
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
        //显示修改页面

        $goods=Tui::find($id);
        $gid = $id;
        return view('admin.tui.edit',compact('goods','gid'));
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
        //执行修改
        //通过ID找到要修改的商品
        $goods = Tui::find($id);
//       获取商品要修改的值

        $input = $request->except('_token','_method');
        //执行修改方法
        $re = $goods->update($input);
        if($re){
            return redirect('admin/tui');
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
        //查询要删除的记录的模型
        $good = Tui::find($id);
        //执行删除操作

        $re = $good->delete();
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
