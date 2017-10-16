<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Lunbo extends Model
{
    //模型关联的表
    protected $table = 'shop_carousel';
    //表的主键
    public $primaryKey = 'lid';
    //允许批量操作的字段
    //  protected $fillable = ['user_name', 'password'];
    //不允许批量操作的字段
    protected $guarded = [];
    //是否维护时间字段
    public $timestamps = false;
}
