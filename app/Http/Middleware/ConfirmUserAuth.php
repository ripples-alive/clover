<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午4:36
 */

namespace Clover\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Request;

use UserAuth;

class ConfirmUserAuth implements Middleware {

    public function handle($request, Closure $next)
    {
        $token = Request::header('token', Request::input('token'));
        UserAuth::authWithToken($token);
        return $next($request);
    }

} 