<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //模型关联的表
    protected $table = 'panda_config';

    //表的主键
    public $primaryKey = 'conf_id';

    //不允许批量操作的字段
    protected $guarded = [];

    //是否维护时间字段
    public $timestamps = false;


}
