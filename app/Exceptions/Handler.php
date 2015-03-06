<?php namespace Clover\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

use ReqLog;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 * @return void
	 */
	public function report(\Exception $e)
	{
        if ($this->shouldntReport($e)) {
            ReqLog::error('None reported exception with message "%s" in %s:%s', $e->getMessage(), $e->getFile(), $e->getLine());
        } else {
            ReqLog::error($e);
        }
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, \Exception $e)
	{
        if ($e instanceof HttpException) {
            return parent::render($request, $e);
        }

        return response()->json([
            'error' => ($e instanceof Exception) ? $e->getName() : 'error',
            'message' => $e->getMessage(),
            'rqid' => ReqLog::getRequestId(),
            'stack' => config('app.debug') ? $e->getTrace() : null,
        ]);
	}

}
