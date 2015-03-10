<?php
/**
 * Created by PhpStorm.
 * User: Jayvic
 * Date: 15/3/6
 * Time: 下午4:06
 */

namespace Clover\Http\Middleware;

use ArrayObject;
use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Contracts\Support\Jsonable;

use ReqLog;

class RequestId implements Middleware {

    public function handle($request, Closure $next)
    {
        ReqLog::beginRequest();

        // Add request id to the returned header in the beginning.
        header('rqid:' . ReqLog::getRequestId());

        $response = $next($request);

        // Add request id to the returned json.
        if ($this->shouldBeJson($response->original)) {
            $response->original['rqid'] = ReqLog::getRequestId();
            $response->setContent($response->original);
        }

        ReqLog::endRequest();
        return $response;
    }

    protected function shouldBeJson($content)
    {
        return $content instanceof Jsonable || $content instanceof ArrayObject || is_array($content);
    }

} 