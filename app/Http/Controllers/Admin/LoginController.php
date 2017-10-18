<?php

namespace App\Http\Controllers\Admin;

use App\User;

use App\Http\Org\code\Code;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    //显示前台登录页面
    public function login()
    {
     return view('admin.login');


    }

   
//        echo Hash::make('123456789');


    //生成验证码
    public function yzm()
    {
        $code = new Code();
       $code ->  make();

    }
    // 验证码生成
    public function captcha($tmp)
    {

        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 110, $height = 35, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::flash('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();

       $code ->  make();

    }



    public function dologin(Request $request)
    {
        $input = $request->except('_token'); //去除 ——Token 值

        $rule = [
            'aname' => 'required|between:4,18',
            'apassword' => 'required|between:4,18',
        ];
        $msg = [
            'aname.required' => '用户名必须输入',
            'aname.between' => '用户名必须在4-18位',
            'apassword.required' => '密码必须输入',
            'apassword.between' => '密码必须在4-18位',
        ];
        $validaor = Validator::make($input, $rule, $msg);
//    dd($validator);
        if ($validaor->fails()) {
            return redirect('admin/login')->withErrors($validaor)->withInput();
        }
        //3.逻辑验证
        //  验证验证码是否正确
        if (strtoupper($input['code']) != session('code')) {
            return redirect('admin/login')->with('errors', '验证码错误')->withInput();
        }
        //3.1 查看用户名是否存在

        $user = User::where('aname', '=', $input['aname'])->first();


        if (!$user) {
            return redirect('admin/login')->with('errors', '此用户不存在')->withInput();
        }
        //3.2 密码是否正确  哈希加密
        $hashedPassword = $user->apassword;

        if (!Hash::check($input['apassword'], $hashedPassword)) {
            return redirect('admin/login')->with('errors', '密码错误')->withInput();
        }

		//4 把用户登录信息存入session里面
        session(['auser'=>$user]);

       return redirect('admin/index');

    }


}
