<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //前台登录登录
    public function login()
    {
        return view('home/login');
    }

    public function register()
    {
        return view('home/register');
    }

//    public function doregister(Request $request)
//    {
//        //前台用户注册 一系列验证
//        $input=$request->except('_token');
//        $rule = [
//            'uname' => 'required|between:4,18',
//            'upassword' => 'required|between:4,18',
//        ];
//        $msg = [
//            'uname.required' => '用户名必须输入',
//            'uname.between' => '用户名必须在4-18位',
//            'upassword.required' => '密码必须输入',
//            'upassword.between' => '密码必须在4-18位',
//        ];
//        $validaor = Validator::make($input, $rule, $msg);
////    dd($validator);
//        if ($validaor->fails()) {
//            return redirect('admin/login')->withErrors($validaor)->withInput();
//        }
//        //3.逻辑验证
//        //  验证验证码是否正确
//        if ($input['code'] != session('code')) {
//            return redirect('admin/login')->with('errors', '验证码错误')->withInput();
//        }
//        //3.1 查看用户名是否存在
//
//        $user = User::where('aname', '=', $input['aname'])->first();
//
//
//        if (!$user) {
//            return redirect('admin/login')->with('errors', '此用户不存在')->withInput();
//        }u
//        //3.2 密码是否正确  哈希加密
//        $hashedPassword = $user->password;
//
//        if (!Hash::check($input['apassword'], $hashedPassword)) {
//            return redirect('admin/login')->with('errors', '密码错误')->withInput();
//        }
//        //4 把用户登录信息存入session里面
//        session(['user'=>$user]);
//
//        return redirect('admin/index');
//
//
//    }
















}
