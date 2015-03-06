<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/4
 * Time: 下午10:42
 */

namespace Clover\Services;

use Log;
use Request;

class ReqLog {

    public function __construct()
    {
        $this->rqid = uniqid('', true);
        $this->format = '[rqid:' . $this->rqid . '] ';
    }

    public function getRequestId()
    {
        return $this->rqid;
    }

    public function beginRequest()
    {
        self::info('BEGIN %s %s %s %s', Request::getClientIp(), Request::method(), Request::path(),
            json_encode(Request::except(array('password'))));
    }

    public function endRequest()
    {
        self::info('END NORMALLY');
    }

    public function debug()
    {
        $args = func_get_args();
        $args[0] = $this->format . $args[0];
        Log::debug(call_user_func_array('sprintf', $args));
    }

    public function info()
    {
        $args = func_get_args();
        $args[0] = $this->format . $args[0];
        Log::info(call_user_func_array('sprintf', $args));
    }

    public function notice()
    {
        $args = func_get_args();
        $args[0] = $this->format . $args[0];
        Log::notice(call_user_func_array('sprintf', $args));
    }

    public function warning()
    {
        $args = func_get_args();
        $args[0] = $this->format . $args[0];
        Log::warning(call_user_func_array('sprintf', $args));
    }

    public function error()
    {
        $args = func_get_args();
        $args[0] = $this->format . $args[0];
        Log::error(call_user_func_array('sprintf', $args));
    }

    public function critical()
    {
        $args = func_get_args();
        $args[0] = $this->format . $args[0];
        Log::critical(call_user_func_array('sprintf', $args));
    }

    public function alert()
    {
        $args = func_get_args();
        $args[0] = $this->format . $args[0];
        Log::alert(call_user_func_array('sprintf', $args));
    }

}
