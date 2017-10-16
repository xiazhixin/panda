<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\HomeUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //后台用户列表
    public function index(Request $request)
    {
//        $input=User::get();//paginate(5);
        $input= $request->input('keywords') ? $request->input('keywords'): '';

        $users=User::orderBy('aid','asc')->where('aname','like','%'.$input.'%')->paginate(5);
        $th=['1'=>'普通管理员','2'=>'高级管理员','3'=>'超级管理员'];
        return view('admin.user.index',compact('input','users','th'));
//       return view('admin/user/index',compact('input','th'));
    }

    //前台用户列表
    public function uindex()
    {
        $input=HomeUser::get();
//       dd($input);
        $tt=['0'=>'正常状态','1'=>'冻结状态'];
      return view('admin/user/ulist',compact('input','tt'));
    }
    //显示前台用户详情 只能修改 状态 数据 0  、1
    public function uupdat($id)
    {
        $user = HomeUser::find($id);
        return view('admin/user/upuuser',compact('user'));
    }

    public function upget(Request $request,$id)
    {
        $input=$request->except('_token');
//       dd($input);

        //  2 找到要修改的用户记录，用提交过来的修改值修改
        $user = HomeUser::find($id);

        $user->uname = $input['uname'];
        $user->email = $input['email'];
        $user->tel = $input['tel'];
        $user->status = $input['status'];
        $re = $user->save();
//        dd($re);

        if ($re){

            return redirect('admin/uindex');
        } else {
            return redirect('admin/uupdat/'.$id)->with('msg','用户修改失败');
        };
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        echo 1111;
        return view('admin/user/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
//        dd($input);
        $rule = [
            'aname' => 'required|between:4,18',
            'apassword' => 'required|between:4,18',
        ];
        $msg = [
            'aname.required' => '用户名必须输入',
            'aname.between' => '用户名必须在4-18位之间',
            'apassword.required' => '密码必须输入',
            'apassword.between' => '密码必须在4-18位之间'
        ];
//        进行手工表单验证
        $validator = Validator::make($input, $rule, $msg);
        //        如果验证失败
        if ($validator->fails()) {
            return redirect('admin/user/create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('aname', '=', $input['aname'])->first();

        if ($user) {
            return redirect('admin/user/create')->with('errors', '此用户已存在')->withInput();
        }
        //hash加密
        $input['apassword'] = Hash::make($input['apassword']);


//        dd($input);
        $re = User::create($input);


        if ($re) {

//             return '成功';

            return redirect('admin/userindex')->with('msg','用户添加成功');
        } else {

            return redirect('/admin/user/create')->with('msg','用户添加失败');

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
        $user =User::find($id);
        return view('admin/user/edit',compact('user'));
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

        $input = $request->except('_token','_method');
//       $re=$request->all();

        $rule = [
            'aname' => 'required|between:4,18',
            'apassword' => 'required|between:4,18',
        ];
        $msg = [
            'aname.required' => '用户名必须输入',
            'aname.between' => '用户名必须在4-18位之间',
            'apassword.required' => '密码必须输入',
            'apassword.between' => '密码必须在4-18位之间'
        ];
//        进行手工表单验证
        $validator = Validator::make($input, $rule, $msg);
        //        如果验证失败
        if ($validator->fails()) {
            return redirect('admin/user/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        //  2 找到要修改的用户记录，用提交过来的修改值修改
        $user = User::find($id);

        $user->aname = $input['aname'];
        $user->aemail = $input['aemail'];
        $user->auth = $input['auth'];
        $re = $user->save();
        if ($re){

            return redirect('admin/user');
        } else {
            return redirect('admin/user/edit')->with('msg','用户修改失败');
        };
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
        $user = User::find($id);
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
