<?php

namespace App\Exceptions;

use App\Constants\StatusCode;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (\Exception $e, $request) {
            $data = null;
            if (env('APP_ENV') !== 'production') {
                $data = [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine()
                ];
            }

            return response()->fail(
                __('messages.system_error'),
                StatusCode::FAIL,
                SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR,
                $data
            );
        });
    }
}
