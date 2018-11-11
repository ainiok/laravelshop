<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
        LoginException::class
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (!env('APP_DEBUG', false)) {
            switch (get_class($exception)) {
                case HttpException::class;
                case NotFoundHttpException::class;
                    return parent::render($request, $exception);
                case LoginException::class;
                    return $exception->getResponse();
                case ModelNotFoundException::class;
                    return response()->json([
                        'code' => 0,
                        'msg' => trans('app.not_found'),
                        'data' => [],
                        'count' => null
                    ]);
                case AuthorizationException::class;
                    return response()->json([
                        'code' => 0,
                        'msg' => trans('app.system_unauthorized'),
                        'data' => [],
                        'count' => null
                    ]);
                default:
                    return response()->json([
                        'code' => 1,
                        'msg' => trans('app.system_fault'),
                        'data' => [],
                        'count' => null
                    ]);
            }
        } else {
            return parent::render($request, $exception);
        }
    }
}
