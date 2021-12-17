<?php

namespace App\Providers;

use App\Constants\StatusCode;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('ok', function (
            $data = null,
            $msg = 'ok',
            $status = StatusCode::OK,
            $httpCode = SymfonyResponse::HTTP_OK
        ) {
            return response()->json([
                'status' => $status,
                'message' => $msg,
                'data' => $data,
            ], $httpCode);
        });

        Response::macro('fail', function (
            $data = null,
            $msg = 'fail',
            $status = StatusCode::FAIL,
            $httpCode = SymfonyResponse::HTTP_BAD_REQUEST
        ) {
            return response()->json([
                'status' => $status,
                'message' => $msg,
                'data' => $data,
            ], $httpCode);
        });
    }
}
