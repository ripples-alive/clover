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
use Validator;

use UserAuth;
use Clover\Exceptions\InputException;
use Clover\Models\User;

class GuestController extends Controller {

    /**
     * @post username
     * @post password
     * @post email
     */
    public function userRegister()
    {
        $username = Request::input('username');
        if (Validator::make(['key' => $username], ['key' => 'required|unique:user,username'])->fails()) {
            throw new InputException('用户名已存在');
        }

        $password = Request::input('password');
        if (Validator::make(['key' => $password], ['key' => 'min:6'])->fails()) {
            throw new InputException('密码至少为6位');
        }
//        if ($password !== Request::input('password_confirm')) {
//            throw new InputException('两次密码不一致');
//        }

        $email = Request::input('email');
        if (Validator::make(['key' => $email], ['key' => 'required|email'])->fails()) {
            throw new InputException('Email地址不合法');
        }

        $user = User::create([
            'username' => $username,
            'password' => Hash::make($password),
            'email' => $email,
        ]);

        return [
            'message' => '注册成功',
            'user' => $user,
        ];
    }

    /**
     * @post username
     * @post password
     */
    public function userLogin()
    {
        $username = Request::input('username');
        $password = Request::input('password');

        $token = UserAuth::login($username, $password);

        return [
            'message' => '登陆成功',
            'token' => $token,
            'user' => UserAuth::info(),
        ];
    }

} 