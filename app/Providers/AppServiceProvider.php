<?php

namespace App\Providers;

use GuzzleHttp\Promise\Create;
use Illuminate\Support\ServiceProvider;

use App\Models\setting;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!app()->runningInConsole()){
            $setting = setting::firstOr(function () {
                return Setting::create([
                     'name' => 'site_name',
                     'description' => 'Laravel'
                 ]);
              });

             view()->share('setting', $setting);
            }
    }
}
