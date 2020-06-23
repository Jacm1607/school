<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('template.theme', function ($view) {
            $menus = Menu::getMenu(true);
            $view->with('mainComposer',$menus);
        });
    }
}
