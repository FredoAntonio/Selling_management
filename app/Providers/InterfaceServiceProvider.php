<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\IClienteRepository;
use App\Repositories\ClienteRepository;
class InterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /* $models = array(
            'Cidade',
            'Cliente'); */

            /* foreach ($models as $model) { */
             
       $this->app->bind("App\Repositories\IClienteRepository","App\Repositories\ClienteRepository")  ;       
       $this->app->bind("App\Services\IClienteService","App\Services\ClienteService")  ;       
            //}
        //
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
