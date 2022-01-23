<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use App\Models\Category;
use App\Models\Advertisement;

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

         Paginator::useBootstrap();


    //compose all the views....
    view()->composer('*', function ($view) 
    {       
           $menus = Category::all(); 
            $view->with('menus', $menus); 

     });// view composer 
     

    }
}
