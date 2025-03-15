<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Enfermera;

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
        // Compartir variables con vistas específicas
        //View::composer('admin.*', function ($view) {
        //    $total_usuarios = User::count();
         //   $total_enfermeras = Enfermera::count();
          //  $view->with(compact('total_usuarios', 'total_enfermeras'));
        //});
    }
}
