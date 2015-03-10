<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午7:35
 */

namespace Clover\Exceptions;

class InputException extends Exception {

    use ExceptionGetName;

    public function __construct($message = '输入不合法', $code = 200)
    {
        parent::__construct($message, $code);
    }

} 