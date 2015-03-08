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

use UserAuth;

class ConfirmUserAuth implements Middleware {

    public function handle($request, Closure $next)
    {
        $token = $request->header('token', $request->input('token'));
        UserAuth::authWithToken($token);
        return $next($request);
    }

} 