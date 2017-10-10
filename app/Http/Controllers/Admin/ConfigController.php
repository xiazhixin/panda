<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function changeContent(Request $request)
    {
        $input = $request->all();
        foreach($input['conf_id'] as $k=>$v){
            $conf = Config::find($v);
            $conf->update(['conf_content'=>$input['conf_content'][$k]]);
        }

        return redirect('admin/config');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::get();
//        dd($config);
        foreach($config as $k=>$v) {
            switch ($v->field_type) {
                //如果当前配置项是文本框
                case 'input':
                    $config[$k]['_content'] = '<input type="text" class="lg" name="conf_content[]" value="' . $v->conf_content . '" >';
                    break;
                //如果当前配置项是文本域
                case 'textarea':
                    $config[$k]['_content'] = '<textarea  name="conf_content[]">' . $v->conf_content . '</textarea>';
                    break;
                //如果当前配置项的类型是单选框
                case 'radio':
                //存放最终要返回的格式化的数据的
                    $str = '';
                    $arr = explode(',',$v->field_value);
                    foreach ($arr as $item) {
                        $a = explode('|',$item);
                //判断是否需要将被选中这个标签checked添加到当前的元素上
                        $c =  ($v->conf_content == $a[0])?'checked':'';
                        $str.='<input type="radio" name="conf_content[]"'.$c.' value="'.$a[0].'" >'.$a[1];

                    }
                    $config[$k]['_content'] = $str;
                    break;


            }


            }

        return view('admin.config.list',compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $input = $request->except('_token');
        $re = Config::create($input);
        if($re){
            return redirect('admin/config');
        } else {
            return redirect('admin/config/create');
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
