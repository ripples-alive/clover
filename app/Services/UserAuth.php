<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午4:42
 */

namespace Clover\Services;

use Cache;
use Hash;

use Random;
use Clover\Exceptions\AuthException;
use Clover\Models\User;

class UserAuth {

    public function __construct()
    {
        $this->userId = null;
        $this->user = null;
    }

    public function id()
    {
        return $this->userId;
    }

    public function info()
    {
        if (empty($this->user)) {
            $this->user = User::find($this->userId);
        }
        return $this->user;
    }

    public function authWithToken($token)
    {
        $this->userId = Cache::get("user_id?token={$token}");
        if (!$this->userId) {
            throw new AuthException('token无效');
        }
    }

    public function login($username, $password)
    {
        $user = User::where('username', $username)->first();
        if (!$user or !Hash::check($password, $user->password)) {
            throw new AuthException('用户名或密码错误');
        }
        $this->user = $user;

        $token = Random::digitsAndLowercase();
        Cache::put("user_id?token={$token}", $user->id, 24 * 60 * 60);
        return $token;
    }

    public function logout($token)
    {
        Cache::pull("user_id?token={$token}");
    }

} 