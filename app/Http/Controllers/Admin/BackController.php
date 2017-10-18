<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Back;
use App\Mail\welcomeToPanda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class BackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //查询所有反馈信息
        $input = $request->input('keywords') ? $request->input('keywords'): '';
        $backs = Back::orderBy('back_id','asc')->where('back_name','like','%'.$input.'%')->paginate(5);
        $backs->back_status = ['已反馈','待反馈'];
        return view('admin.back.list',compact('backs','input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //获取要修改的数据
        $back = Back::find($id);
        return view('admin.back.toemail',compact('back','id'));

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

        //接收数据
        $res = $request->except('_method');
//     dd($res);
        $res['back_id'] = $id;
        if($res){
            //Mail::send('使用的邮件模板'，'向模板中传递的变量'，'跟邮箱相关的一些信息如邮件的标题、发送人、收件人额、昵称等等')
            Mail::send('email.back', ['res' => $res], function ($m) use ($res) {
                //$m->from('hello@app.com', 'Your Application');
                $m->to($res['back_email'], $res['back_name'])->subject('反馈处理结果!');
            });
            echo"<script > alert('邮件已发送至用户的邮箱');
                        location.href='http://panda.com/admin/back';
            </script>" ;

        }else{

            echo"<script > alert('发送失败');
                        location.href='http://panda.com';
            </script>" ;
        }


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
        $back = Back::find($id);
        //执行删除操作

        $re = $back->delete();
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
        return  $data;
    }

    public function test()
    {
        return view('admin.back.active');
    }
}
