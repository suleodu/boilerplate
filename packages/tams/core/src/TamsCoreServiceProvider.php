<?php

namespace Tams\Core;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class TamsCoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        $this->loadRoutesFrom(__DIR__ .'/routes/web.php');
        $this->loadViewsFrom(__DIR__ .'/./../resources/views', 'TamsCore');
        
        
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPublishables();
    }
    
    
    private function registerPublishables()
    {
        $basePath = dirname(__DIR__);
        
        $arrPublishable = [
            'migrations' => [
                "$basePath/publishables/database/migrations" => database_path('migrations'),
                "$basePath/publishables/config/tams_core.php"=> config_path('tams_core.php')
            ]
        ];
        
        foreach ($arrPublishable as $group => $paths) {
            $this->publishes($paths, $group); 
        }
    }
}
