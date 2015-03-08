<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 下午12:12
 */

namespace Clover\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {

    protected $table = 'topic';

    protected $guarded = ['id', 'created_at', 'updated_at'];

} 