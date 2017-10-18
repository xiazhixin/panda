<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddsController extends Controller
{
    //添加子类
    public function adds($id)
    {
        $ids = $id;
        //查询所有数据
        $cate = new Cate();
        $cates = $cate->tree();
        //引入一个页面
        return view('admin.cate.adds',compact('cates','ids'));
    }
}
