<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午6:38
 */

namespace Clover\Exceptions;

class Exception extends \Exception {

    use ExceptionGetName;

    public function __construct($message = '发生未知错误', $code = 200)
    {
        parent::__construct($message, $code);
    }


}