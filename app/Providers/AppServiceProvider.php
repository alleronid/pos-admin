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
            try {
                $general_settings = \App\Models\GeneralSetting::first();
                if (!$general_settings) {
                    // Create dummy settings if not exists
                    $general_settings = (object) [
                        'site_title' => 'POD ADMIN',
                        'logo' => (object) ['file' => asset('/logo/logo.png')],
                        'smallLogo' => (object) ['file' => asset('/logo/small_logo.png')],
                        'favicon' => (object) ['file' => asset('/logo/small_logo.png')],
                        'dark_mode' => 0
                    ];
                }
                $seederRun = false; // For development, assume seeder is run
                $storageLink = false; // Hide storage link warning for now
                
                $view->with('general_settings', $general_settings);
                $view->with('seederRun', $seederRun);
                $view->with('storageLink', $storageLink);
            } catch (\Exception $e) {
                // If database not ready, use defaults
                $general_settings = (object) [
                    'site_title' => 'POD ADMIN',
                    'logo' => (object) ['file' => asset('/logo/logo.png')],
                    'smallLogo' => (object) ['file' => asset('/logo/small_logo.png')],
                    'favicon' => (object) ['file' => asset('/logo/small_logo.png')],
                    'dark_mode' => 0
                ];
                $view->with('general_settings', $general_settings);
                $view->with('seederRun', false);
                $view->with('storageLink', true);
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        
        // Share data with all views
        $this->shareViewData();
        
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
