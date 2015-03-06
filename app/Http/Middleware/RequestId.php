<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午4:06
 */

namespace Clover\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;

use ReqLog;

class RequestId implements Middleware {

    public function handle($request, Closure $next)
    {
        ReqLog::beginRequest();
        $response = $next($request);
        ReqLog::endRequest();
        return $response;
    }

} 