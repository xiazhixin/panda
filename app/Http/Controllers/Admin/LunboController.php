<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Lunbo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Services\OSS;
use Illuminate\Support\Facades\Validator;


class LunboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Lunbo::all();
        return view('admin.lunbo.index',compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.lunbo.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        //实现     获取上传的文件对象
      $file = Input::file('file_upload');

        //判断文件是否有效
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
            //             1将文件上传到本地服务器
            //          2  将文件上传到OSS
            $pic = $file->getRealPath();
            //            阿里OSS上传
            OSS::upload('uploads/' . $newName, $pic);

            $filepath = 'uploads/' . $newName;
            //返回文件的路径
            return $filepath;

       }

    }

    public function but(Request $request)
    {
        $input=$request->except('_token','file_upload');
         $lj='http://xm-panda.oss-cn-beijing.aliyuncs.com/';
        $input['art_thumb']=$lj.$input['art_thumb'];
        $tem=time();
        $input['ltime']="{$tem}";

        $rule = [
            'lname' => 'required|between:2,18',

        ];
        $msg = [
            'lname.required' => '图片名必须输入',
            'lname.between' => '图片名必须在2-18位之间',
        ];
//        进行手工表单验证

        $validator = Validator::make($input, $rule, $msg);
        //        如果验证失败
        if ($validator->fails()) {
            return redirect('admin/lunbo/create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Lunbo::where('lname', '=', $input['lname'])->first();

        if ($user) {
            return redirect('admin/lunbo/create')->with('errors', '此昵称已存在')->withInput();
        }

        $re = Lunbo::create($input);

        if ($re) {

//             return '成功';

            return redirect('admin/lunbo')->with('msg','图片添加成功');
        } else {

            return redirect('/admin/lunbo/create')->with('msg','添加失败');

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
        $user = Lunbo::find($id);
        //执行删除操作
        $re = $user->delete();
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
//        return json_encode($data);
//        return response()->json($data);
        return  $data;
    }
}
