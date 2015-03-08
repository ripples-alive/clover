<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/8
 * Time: 上午9:55
 */

namespace Clover\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

use Clover\Exceptions\InputException;
use Clover\Models\User;

class GuestController extends Controller {

    public function userRegister(Request $request)
    {
        // TODO
        $username = $request->input('username');
        $password = $request->input('password');
        if ($password !== $request->input('password_confirm')) {
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

    public function userLogin(Request $request)
    {
        // TODO
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->first();
        if (!$user or !Hash::check($password, $user->password)) {
            throw new InputException('用户名或密码错误');
        }

        $token = 'TODO';

        return [
            'message' => '登陆成功',
            'token' => $token
        ];
    }

} 