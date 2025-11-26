<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
       $this->routes(function () {
            Route::get('/', function(){
                return redirect()->route('installer.welcome.index');
            });
            
            // Auth routes for preview
            Route::middleware('web')->group(function() {
                Route::get('/signin', [\App\Http\Controllers\Auth\SignInController::class, 'index'])->name('signin.index');
                Route::post('/signin', [\App\Http\Controllers\Auth\SignInController::class, 'signin'])->name('signin.request');
                Route::get('/signup', [\App\Http\Controllers\Auth\SignUpController::class, 'index'])->name('signup.index');
                Route::post('/signup', [\App\Http\Controllers\Auth\SignUpController::class, 'signup'])->name('signup.request');
            });
       });
    }
}
