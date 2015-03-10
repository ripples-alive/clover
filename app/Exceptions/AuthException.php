<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午9:31
 */

namespace Clover\Exceptions;

class AuthException extends Exception {

    use ExceptionGetName;

    public function __construct($message = '身份验证错误', $code = 200)
    {
        parent::__construct($message, $code);
    }

} 