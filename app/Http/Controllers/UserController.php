<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/4
 * Time: 下午9:57
 */

namespace Clover\Http\Controllers;

use Request;

use UserAuth;
use ReqLog;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware('userFilter');
    }

    public function getIndex()
    {
        var_dump(UserAuth::id());
        ReqLog::debug('%s is %s', 'this', 'test');
        ReqLog::debug('%s is %s', 'this', 'test again');
    }

    public function getTest()
    {
        return response()->json([
            'test' => '这里是test.'
        ]);
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

}
