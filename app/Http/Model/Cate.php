<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cate extends Model
{
    //
    //模型关联的表
    protected $table = 'shop_cate';
    //表的主键
    public $primaryKey = 'id';
    //不允许批量操作的字段
    protected $guarded = [];
    //是否维护时间字段
    public $timestamps = false;

    //格式化数据
    public function tree()
    {
        //获取所有的分类
        $cates = $this->orderBy('id','asc')->get();
        $data = $this->findSubTree($cates,0,0);

        return $data;
    }
    //将需要的数据格式化的方法（将分类数据有分层缩进还有顺序）
    public function findSubTree($cates,$id=0,$lev=1){
        $subtree = [];//子孙数组
        foreach ($cates as $v) {
            if($v->cate_pid==$id){
                $v->lev = $lev;
                $subtree[] = $v;
                $subtree = array_merge($subtree,$this->findSubTree($cates,$v->id,$lev+1));
            }
        }
        return $subtree;
    }
}
