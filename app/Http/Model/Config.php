<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //模型关联的表
    protected $table = 'shop_config';

    //表的主键
    public $primaryKey = 'conf_id';

    //不允许批量操作的字段
    protected $guarded = ['conf_id','field_value'];

    //是否维护时间字段
    public $timestamps = false;


}
