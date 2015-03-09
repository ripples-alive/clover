<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/4
 * Time: 下午9:57
 */

namespace Clover\Http\Controllers;

use Clover\Exceptions\InputException;
use Clover\Exceptions\NotFoundException;
use Clover\Models\Follow;
use Request;

use UserAuth;
use Validator;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware('userFilter');
    }

    public function postLogout()
    {
        $token = Request::header('token', Request::input('token'));
        UserAuth::logout($token);

        return [
            'message' => '登出成功',
        ];
    }

    public function getInfo()
    {
        // TODO
    }

    public function postUpdateInfo()
    {
        // TODO
    }

    /**
     * @post star
     */
    public function postFollow()
    {
        $follow = new Follow();
        $follow->follower = UserAuth::id();

        $follow->star = intval(Request::input('star'));
        if ($follow->follower === $follow->star) {
            throw new InputException('不能关注自己');
        }
        if (Validator::make(['key' => $follow->star], ['key' => 'exists:user,id'])->fails()) {
            throw new NotFoundException('大腿不存在');
        }

        $follow->save();

        return [
            'message' => '关注大腿成功',
        ];
    }

    /**
     */
    public function getListFollow()
    {
        return [
            'message' => '列出关注成功',
            'follows' => Follow::listFollowUser(UserAuth::id()),
        ];
    }

}
