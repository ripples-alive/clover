<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/4
 * Time: 下午9:57
 */

namespace Clover\Http\Controllers;


class UserController extends Controller {

    public function getIndex()
    {
        return response()->json([
            'a' => '测试'
        ]);
    }

    public function getTest() {
        return response()->json([
            'test' => '这里是test.'
        ]);
    }

} 