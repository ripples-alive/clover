<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/4
 * Time: 下午9:57
 */

namespace Clover\Http\Controllers;

use ReqLog;

class UserController extends Controller {

    public function getIndex()
    {
        ReqLog::debug('%s is %s', 'this', 'test');
        ReqLog::debug('%s is %s', 'this', 'test again');
    }

    public function getTest()
    {
        return response()->json([
            'test' => '这里是test.'
        ]);
    }

}
