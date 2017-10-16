<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\HomeUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CenterController extends Controller
{
    //个人中心页面
    public function index()
    {
        if(session('user')){
            return  view('home.center.center');
        }else{
            return redirect('/home/login/')->with('errors', '请先登录');
        }
    }

    //个人信息
    public function information()
    {
        return view('home.center.information');
    }
    //修改个人信息
    public function update(Request $request,$id)
    {
        $input = $request -> except('_token','art_thumb','file_upload');
//        dd($input);
        $rule = [
            'uname' => 'between:3,20',
            'nickname' => 'between:2,18',
            'tel' => 'between:11,11',
        ];
        $msg = [
            'uname.between' => '用户名必须在3-20位',
            'nick.between' => '昵称必须在2-18位',
            'tel.between' => '电话必须是11位',
        ];
        $validate = Validator::make($input,$rule,$msg);
//        dd($validate);
        if(!$input['uname']){
            $input['uname'] = null;
        }
        if(!$input['age']){
            $input['age'] = null;
        }
        if(!$input['nickname']){
            $input['nickname'] = null;
        }
        if(!$input['tel']){
            $input['tel'] = null;
        }

        $res = HomeUser::where('uid',$id)->update($input);
        $user = HomeUser::where('uid',$id)->first();
        session(['user'=>$user]);
//        dd(session('user'));
        if($res){
            return redirect("home/center/");
        }else{
            return redirect("home/center/information")->withErrors($validate)->withInput();
        }
    }


    //文件上传方法
    public function upLoad(Request $request)
    {
        //实现获取上传的文件对象
        $file = $request->file('file_upload');
        //dd($file);
        //判断文件是否有效
        if ($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
            // 1将文件上传到本地服务器
            $path = $file->move(public_path() . '/uploads', $newName);
            $filepath = 'uploads/' . $newName;
            //返回文件的路径
            return $filepath;
        }
    }
}
