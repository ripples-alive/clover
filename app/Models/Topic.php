<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 下午12:12
 */

namespace Clover\Models;

use Illuminate\Database\Eloquent\Model;

use Clover\Enumerations\TopicType;

class Topic extends Model {

    protected $table = 'topic';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * 自动将type解析为字符串
     * @return string
     */
    public function getTypeAttribute()
    {
        return TopicType::stringify($this->attributes['type']);
    }

} 