<?php

namespace App\Providers;

use App\Repositories\GeneralSettingRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    
    public function shareViewData(): void
    {
        view()->composer('*', function ($view) {
            $general_settings = \App\Models\GeneralSetting::first();
            $seederRun = false; // For development, assume seeder is run
            $view->with('general_settings', $general_settings);
            $view->with('seederRun', $seederRun);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        // Allow access to signin, signup, and static assets even without installation
        $allowedPaths = ['install', 'install/*', 'signin', 'signin/*', 'signup', 'signup/*', 'assets/*', 'icons/*', 'logo/*', 'public/*'];
        $isAllowed = false;
        foreach ($allowedPaths as $path) {
            if (request()->is($path)) {
                $isAllowed = true;
                break;
            }
        }
        
        if (!file_exists(base_path('storage/installed')) && !$isAllowed) {
            header("Location: install");
            exit;
        }
    }
}
