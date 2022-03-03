<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::prefix('admin')
                ->name('admin.')
                ->middleware('api')
                ->group(base_path('routes/admin.php'));

            Route::prefix('api')
                ->name('api.')
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        });


        Route::bind('category',Category::class);
        Route::bind('product',Product::class);
        Route::bind('warehouse',Warehouse::class);
        Route::bind('purchase',Purchase::class);
        Route::bind('user',User::class);
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }
}
