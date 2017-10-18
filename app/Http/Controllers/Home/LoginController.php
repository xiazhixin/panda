<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\SMS\Ucpaas;
use App\Http\Model\HomeUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

        $a = range(0,9);
        for($i=0;$i<6;$i++){

            $b[] = array_rand($a);
        }

        $code=(join($b));
        session(['pcode'=>$code]);
        $appId = "36386decf2604aa89db2dc3507354118";
          $to = $input['phone'];
         $templateId = "178481";
         $param="$code";

    return $ucpass->templateSMS($appId,$to,$templateId,$param);

    }


    public function sendcode2(Request $request)
    {
        $input=$request->except('_token');

        if (session('pcode')==$input['pcode']){
            return  0;
        }else {

            return 1;
        }
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

      return redirect('/');
        }
    }


    public function forget()
    {
        return view('home.forget');
    }

     public function doForget(Request $request)
    {

        //获取请求的参数userid   token
        $input = $request->all();

        //根据请求中的用户邮箱获取到要找回密码的用户
        $user=[];
        $user['_token']=$input['_token'];

        $user['uname']= HomeUser::where('uname',$input['uname'])->first()->toarray();

        if($user){

            Mail::send('email.forget', ['user' => $user], function ($m) use ($user) {
                //$m->from('hello@app.com', 'Your Application');
                $m->to($user['uname']['email'], $user['uname']['uname'])->subject('找回密码!');
            });
            echo"<script > alert('邮件已发送至进的邮箱请注意查收');
                        location.href='http://www.panda.com';
            </script>" ;

        }else{

            echo"<script > alert('无效的邮箱激活链接，请联系客服');
                        location.href='http://www.panda.com';
            </script>" ;
        }


    }

    //重置密码页面
    public function Reset(Request $request)
    {
       $uid= $request['userid'];
       return view('home.resetget',compact('uid'));
    }

    //重置密码逻辑
    public function doReset(Request $request)
    {

        //request中包含UID,pass,repass
//        首先根据uid获取到要修改密码的用户记录
        $uid = $request['uid'];
        $user = HomeUser::find($uid);
        $pass = Hash::make($request['upassword']);
//        执行update方法，将这个用户的密码修改为新密码
        $re = $user->update(['upassword'=>$pass]);

        if($re){


            echo"<script > alert('密码修改成功');
                        location.href='http://www.panda.com/home/login';
            </script>" ;

        }else{
            echo"<script > alert('密码修改失败');
                        location.href='http://www.panda.com';
            </script>" ;
            
    }

    }

}
