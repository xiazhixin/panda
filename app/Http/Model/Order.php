<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //模型关联的表
    protected $table = 'shop_orders';

    //表的主键
    public $primaryKey = 'oid';

    //不允许批量操作的字段
    protected $guarded = [];

    //是否维护时间字段
    public $timestamps = false;

    public function homeusers()
    {
        return $this->hasMany('App\Http\Model\HomeUser','uid','uid');
    }

}
