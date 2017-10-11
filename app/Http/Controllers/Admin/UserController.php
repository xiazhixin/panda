<?php

namespace App\Http\Controllers\Admin;

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
    public function index()
    {
        $input=User::get();//paginate(5);
        $th=['1'=>'普通管理员','2'=>'高级管理员','3'=>'超级管理员'];

       return view('admin/user/index',compact('input','th'));
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

            return redirect('admin/user/create');
        } else {

            return redirect('/admin/user/create')->with('msg','用户添加失败');;

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
        //
    }
}
