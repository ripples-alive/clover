<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/9
 * Time: 下午10:30
 */

namespace Clover\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {

    protected $table = 'like';

    protected $guarded = ['id', 'created_at', 'updated_at'];

} 