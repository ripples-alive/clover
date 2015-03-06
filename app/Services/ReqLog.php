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
        self::info('BEGIN %s %s %s', Request::getClientIp(), Request::method(), Request::path(),
            json_encode(Request::except(array('password'))));
    }

    public function endRequest()
    {
        self::info('END');
    }

    public function debug()
    {
        $args = func_get_args();
        $args[0] = $this->format . $args[0];
        Log::debug(call_user_func_array('sprintf', $args));
    }

    public function info()
    {

    }

    public function notice()
    {

    }

    public function alert()
    {

    }

    public function critical()
    {

    }

    public function error()
    {

    }

} 