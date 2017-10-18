<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //模型关联的表
    protected $table = 'panda_admin';
    //表的主键
    public $primaryKey = 'aid';
    //允许批量操作的字段
    //  protected $fillable = ['user_name', 'password'];
    //不允许批量操作的字段
    protected $guarded = [];
    //是否维护时间字段
    public $timestamps = false;
}
