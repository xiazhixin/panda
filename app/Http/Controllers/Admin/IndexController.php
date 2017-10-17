<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin/index');
    }


    public function logout()
    {
        session(['user'=>null]);
        return redirect('admin/login');

    }

    //   修改密码页面
    public function repass()
    {
        return view('admin.index.pass');
    }
    //   修改密码逻辑
    public function dorepass(Request $request)
    {
        //dd(11111);
//        return 1111;
//        1 获取用户传过来的新密码
        $input =  $request->except('_token');
//        dd($input);
//        $input = $input->;
//        2 验证密码是否符合要求
        $rule=[
            'password_o'=>'required|between:4,18',
            'password'=>'required|between:4,18',
            'password_c'=>'required|same:password',
        ];
        $msg = [
            'password_o.required'=>'原始密码必须输入',
            'password_o.between'=>'原始密码必须在4-18位之间',
            'password.required'=>'新密码必须输入',
            'password.between'=>'新密码必须在4-18位之间',
            'password_c.required'=>'确认密码必须输入',
            'password_c.same'=>'确认密码必须跟新密码一致'
        ];


//        进行手工表单验证
        $validator = Validator::make($input,$rule,$msg);
        //dd($validator);
        if ($validator->fails()) {
            return redirect('admin/repass')
                ->withErrors($validator)
                ->withInput();
        }


//判断原密码是否正确
        $user =  User::find(session('user')->aid);
//        dd($user->apassword);
        if(Hash::check($user->apassword,$input['password_o'])){
//        if($input['password_o'] !=  Crypt::decrypt($user->apassword)){
            return redirect('admin/repass')->with('errors','原密码错误')->withInput();
        }

//   修改密码
        $user->apassword = Hash::make($input['password']);
        $re = $user->save();
        if($re){
            //return '成功';
            return redirect('admin/repass')->with('errors','密码修改成功');
        }else{
            //return '失败';
            return redirect('admin/repass')->with('errors','密码修改失败');
        }

    }

}

