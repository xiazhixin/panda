<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //模型关联的表
    protected $table = 'shop_detail';
    //表的主键
    public $primaryKey = 'did';
    //不允许批量操作的字段
    protected $guarded = [];
    //是否维护时间字段
    public $timestamps = false;
}
