<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午2:31
 */

namespace Clover\Facades;

use Illuminate\Support\Facades\Facade;

class ReqLog extends Facade {

    public static function getFacadeAccessor()
    {
        return 'reqLog';
    }

} 