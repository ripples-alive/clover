<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午4:54
 */

namespace Clover\Facades;

use Illuminate\Support\Facades\Facade;

class UserAuth extends Facade {

    public static function getFacadeAccessor()
    {
        return 'userAuth';
    }

}