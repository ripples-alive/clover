<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 下午2:43
 */

namespace Clover\Services;

class Random {

    public function digitsAndLowercase($length = 32)
    {
        $table = '0123456789abcdefghijklmnopqrstuvwxyz';
        $table_length = strlen($table);

        $result = '';
        for ($i = 0; $i < $length; ++$i) {
            $result .= $table[mt_rand(0, $table_length - 1)];
        }

        return $result;
    }

} 