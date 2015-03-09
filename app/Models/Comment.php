<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/9
 * Time: 上午2:44
 */

namespace Clover\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comment';

    protected $guarded = ['id', 'created_at', 'updated_at'];

} 