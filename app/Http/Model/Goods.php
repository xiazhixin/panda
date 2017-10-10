<?php

namespace App\http\model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //模型关联的表
    protected $table = 'shop_goods';
    //表的主键
    public $primaryKey = 'gid';
    //不允许批量操作的字段
    protected $guarded = [];
    //是否维护时间字段
    public $timestamps = true;

//    public function cates()
//    {
//        return $this->belongsTo('App\Http\Model\Cate', 'cate_id', 'cate_id');
//    }
}
