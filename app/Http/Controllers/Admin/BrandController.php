<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Brand;
use App\Http\Model\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取所有的品牌数据
//        $brands = Brand::orderBy('brand_id','asc')->paginate(5);
        $input = $request->input('keywords') ? $request->input('keywords'): '';

        $brands = Brand::orderBy('brand_id','asc')->where('brand_name','like','%'.$input.'%')->paginate(5);

        //获取属于的类别
        /*foreach ($brands as $m=>$n) {
            $ids[]=$n->brand_cate_id;
        }
        foreach ($ids as $k=>$v) {
            $cates[$v] =  DB::select('select cate_name from shop_cate where id ='.$v);
        }*/
//        dd($cates);
//        dd( $cates[18][0]->cate_name);
//        引入一个页面
        return view('admin.brand.list',compact('brands','input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取类别
        $cate = new Cate();
        $cates = $cate->tree();
        //引入一个页面
        return view('admin.brand.add',compact('cates'));
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
//        echo 1;
        $input = $request->except('_token','file_upload');

        $re =Brand::create($input);
        if($re){
            return redirect('admin/brand');
        }else{
            return redirect('admin/brand/create');
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
        $ids = $id;
        //获取要修改的数据
        $brand = Brand::find($id);
        //引入一个页面
        return view('admin.brand.edit',compact('brand','ids'));
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
        //获取要修改的模型
        $brand = Brand::find($id);

        $check = $brand->update($res);
        if ($check) {
            return redirect('admin/brand');
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
        //查询要删除的记录的模型
        $brand = Brand::find($id);
        //执行删除操作

        $check = $brand->delete();
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
    //文件上传方法
    public function upLoad(Request $request)
    {
        //实现     获取上传的文件对象
        $file = $request->file('brand_logo');
        //判断文件是否有效
        if ($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
            // 1将文件上传到本地服务器
            $path = $file->move(public_path() . '/uploads/brand', $newName);

            $filepath = 'uploads/brand/' . $newName;
            //返回文件的路径
            return $filepath;
        }
    }
}
