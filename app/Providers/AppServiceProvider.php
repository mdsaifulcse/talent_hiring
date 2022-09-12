<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use View;

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
        View::composer( // for left nav --------------
            [
                'admin.layout.top-nav',
                'admin.layout.left-nav',
            ],
            function ($view)
            {
                $authUser=User::find(3);
                $view->with(['authUser'=>$authUser]);
            });
    }
}
