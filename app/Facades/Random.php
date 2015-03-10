<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 下午2:59
 */

namespace Clover\Facades;

use Illuminate\Support\Facades\Facade;

class Random extends Facade {

    public static function getFacadeAccessor()
    {
        return 'random';
    }

} 