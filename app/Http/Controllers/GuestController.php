<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 上午9:55
 */

namespace Clover\Http\Controllers;

use Request;
use Hash;

use UserAuth;
use Clover\Exceptions\InputException;
use Clover\Models\User;

class GuestController extends Controller {

    public function userRegister()
    {
        // TODO
        $username = Request::input('username');
        $password = Request::input('password');
        if ($password !== Request::input('password_confirm')) {
            throw new InputException('两次密码不一致');
        }

        $user = User::create([
            'username' => $username,
            'password' => Hash::make($password),
        ]);

        return [
            'message' => '注册成功',
            'user' => $user,
        ];
    }

    public function userLogin()
    {
        // TODO
        $username = Request::input('username');
        $password = Request::input('password');

        $token = UserAuth::login($username, $password);

        return [
            'message' => '登陆成功',
            'token' => $token,
        ];
    }

} 