<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/9
 * Time: 上午12:23
 */

namespace Clover\Exceptions;

class EnumerationException extends Exception {

    use ExceptionGetName;

    public function __construct($message = '枚举错误', $code = 200)
    {
        parent::__construct($message, $code);
    }

} 