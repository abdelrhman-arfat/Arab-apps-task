<?php

namespace App\Providers;

use App\Service\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(4)->by($request->user()?->id ?: $request->ip())->response(function () {
                return response(ResponseService::error("Too many requests. Please try again later."), 429);
            });
        });
    }
}
