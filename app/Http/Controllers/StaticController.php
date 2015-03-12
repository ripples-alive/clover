<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/11
 * Time: 下午3:01
 */

namespace Clover\Http\Controllers;

use Request;
use Response;

class StaticController extends Controller {

    public function getVideo()
    {
        return Response::download('../storage/video/' . Request::input('name'));
    }

} 