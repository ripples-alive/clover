<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午4:42
 */

namespace Clover\Services;

class UserAuth {

    public function __construct()
    {
        $this->userId = null;
    }

    public function id()
    {
        return $this->userId;
    }

    public function authWithToken($token)
    {
        if (!$token) {
            throw new \Exception('测试错误');
        }
        $this->userId = $token;
    }

} 