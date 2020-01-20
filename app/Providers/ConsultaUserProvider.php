<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\ConsultaUser;

class ConsultaUserProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ConsultaUser',function(){

        return new ConsultaUser();

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
