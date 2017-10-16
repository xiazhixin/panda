<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    //模型关联的表
    protected $table = 'shop_delivery';
    //表的主键
    public $primaryKey = 'id';
    //不允许批量操作的字段
    protected $guarded = [];
    //是否维护时间字段
    public $timestamps = false;
}
