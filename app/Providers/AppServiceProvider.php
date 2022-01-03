<?php

namespace App\Providers;

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

    //compose all the views....
    view()->composer('*', function ($view) 
    {       
        //----------this is for the second navbar(template.blade.php)----------------//
           $menus = Category::all(); 
            $view->with('menus', $menus); 

         //-----------this is for displaying cars(front-design.blade.php)------------//
            $category_car = Category::where('name','cars')->first();
            $first_display_cars = Advertisement::where('category_id',$category_car->id)->take(4)->get();
            //getting all cars exept in $first_display_cars variable
            $second_display_cars=Advertisement::where('category_id',$category_car->id)->whereNotIn('id',$first_display_cars->pluck('id')->toArray())->take(4)->get();
            
            $view->with('category_car', $category_car);
            $view->with('first_display_cars', $first_display_cars);
            $view->with('second_display_cars', $second_display_cars); 


         //-----------this is for displaying cellphone(front-design.blade.php)------------//
            $category_phone = Category::where('name','cellphone')->first();
            $first_display_phone = Advertisement::where('category_id',$category_phone->id)->take(4)->get();
            //getting all cars exept in $first_display_phone variable
            $second_display_phone=Advertisement::where('category_id',$category_phone->id)
            ->whereNotIn('id',$first_display_phone->pluck('id')->toArray())->take(4)->get();
            
            $view->with('category_phone', $category_phone);
            $view->with('first_display_phone', $first_display_phone);
            $view->with('second_display_phone', $second_display_phone); 

     });// view composer 
     

    }
}
