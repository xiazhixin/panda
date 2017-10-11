<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class HomeUser extends Model
{
    //模型关联的表
    protected $table = 'users';
    //表的主键
    public $primaryKey = 'uid';
    //允许批量操作的字段
    //  protected $fillable = ['user_name', 'password'];
    //不允许批量操作的字段
    protected $guarded = [];
    //是否维护时间字段
    public $timestamps = false;
}
