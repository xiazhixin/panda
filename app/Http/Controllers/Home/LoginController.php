<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\SMS\Ucpaas;
use App\Http\Model\HomeUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    //前台登录登录
    public function login()
    {
        return view('home/login');
    }
    //前台用户退出
    public function outlog()
    {
        session(['user'=>null]);
        return redirect('home/login');
    }
    
    //注册视图
    public function register1()
    {
        return view('home/register1');
    }
    //发送手机验证码
    public function sendcode1(Request $request)
    {
       $input=$request->except('_token');
//    dd($input);
        $options['accountsid']='dddfb68ab59c2637e0f1863f53903590';
        $options['token']='db0cec8867e79a22488b294a7f442273';

    //初始化 $options必填
        $ucpass = new Ucpaas($options);
//    dd($ucpass);
    //开发者账号信息查询默认为json或xml
//        echo $ucpass->getDevinfo('xml');
//       $input=$ucpass->getDevinfo('xml');
//        dd($input);
        //短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
    $appId = "36386decf2604aa89db2dc3507354118";
    $to = $input['phone'];
    $templateId = "178482";
    $param="test,1256,3";

    return $ucpass->templateSMS($appId,$to,$templateId,$param);

    }
    //注册提交来的信息
    public function doregister(Request $request)
    {

           $input['uname']=$request['user'][0];
           $input['upassword']=$request['user'][1];
          $input['tel']=$request['user'][2];
           $input['email']=$request['user'][3];
              $regtime=time();
            $input['regtime']="{$regtime}";
        //hash加密
        $input['upassword'] = Hash::make($input['upassword']);
//        dd($input);
          $re = HomeUser::create($input);

    }
        //接收前台注册用户是否存在
    public function ajax(Request $request)
    {
//        return 1213;
      $user = HomeUser::where('uname', '=',$request->uv)->first();
        if($user){
            return 1;
        }else{
            return 0;
        }


    }

    //前台登录页面
    public function dologin(Request $request)
    {
        //接收登录信息 去除 _token
        $input = $request->except('_token');
        $rule = [
            'uname' => 'required|between:3,20',
            'upassword' => 'required|between:6,20',
        ];
        $msg = [
            'uname.required' => '用户名必须输入',
            'uname.between' => '用户名必须在3-20位',
            'upassword.required' => '密码必须输入',
            'upassword.between' => '密码必须在6-20位',
        ];
        $validaor = Validator::make($input, $rule, $msg);
//    dd($validator);
        if ($validaor->fails()) {
            return redirect('home/login')->withErrors($validaor)->withInput();
        }
        //3.逻辑验证
        //  验证验证码是否正确
        if (strtoupper($input['code'])!= session('code')) {
            return redirect('home/login')->with('errors', '验证码错误')->withInput();
        }
        //3.1 查看用户名是否存在

        $user = HomeUser::where('uname', '=', $input['uname'])->first();
        $sta=$user['status'];
        if ($sta==1) {
            return redirect('home/login')->with('errors', '此账号已被冻结，请联系管理员')->withInput();
        }else{


        if (!$user) {
            return redirect('home/login')->with('errors', '此用户不存在')->withInput();
        }
        //3.2 密码是否正确  哈希加密
        $hashedPassword = $user->upassword;

        if (!Hash::check($input['upassword'], $hashedPassword)) {
            return redirect('home/login')->with('errors', '密码错误')->withInput();
        }
        //4 把用户登录信息存入session里面
         session(['user'=>$user]);

      return redirect('home/index');
        }
    }
    


}
