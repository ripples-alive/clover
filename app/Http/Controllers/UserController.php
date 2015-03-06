<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/4
 * Time: 下午9:57
 */

namespace Clover\Http\Controllers;

use Clover\Facades\ReqLog;

class UserController extends Controller {

    public function getIndex()
    {
        ReqLog::debug('hehe');
    }

    public function getTest()
    {
        return response()->json([
            'test' => '这里是test.'
        ]);
    }

}
