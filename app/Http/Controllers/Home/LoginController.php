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

    public function doregister(Request $request)
    {
        $input=$request->except('_token');
        
    }














}
