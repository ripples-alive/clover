<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午9:27
 */

namespace Clover\Exceptions;

trait ExceptionGetName {

    public function getName()
    {
        return lcfirst(substr(strrchr(__CLASS__, '\\'), 1));
    }

}

