<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/9
 * Time: 上午1:14
 */

namespace Clover\Exceptions;

class NotFoundException extends Exception {

    use ExceptionGetName;

    public function __construct($message = '对象未找到', $code = 200)
    {
        parent::__construct($message, $code);
    }

} 