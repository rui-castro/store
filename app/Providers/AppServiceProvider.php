<?php

namespace Store\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Route;
use Store\Repositories\BagRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Define variables "controller" and "action" to use in views.
         * See: http://stackoverflow.com/a/29549985/2602440
         * See: https://laravel.com/api/5.3/Illuminate/Routing/Router.html#method_currentRouteName
         */
        app('view')->composer('*', function ($view) {
            $route_parts = explode('.', Route::currentRouteName());
            $view->with(['route_parts' => implode(' ', $route_parts)]);
            // Inject bag into the view
            $view->with(['bag' => BagRepository::getCurrent()]);
        });

        /* Workaround to enforce foreign key on SQLite
         * See: http://stackoverflow.com/a/31228951/2602440
         */
        if (DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {
            DB::statement(DB::raw('PRAGMA foreign_keys=1'));
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
