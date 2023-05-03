<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Menuvisibility;
use App\Models\Submenu;
use App\Models\Topbarcontact;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function($view)
       {
        $data=Category::all(); 
        View::share('categories', $data);
       });


       View::composer('*', function($view1)
       {
        $data=Subcategory::all(); 
        View::share('subcategories', $data);
       });


       View::composer('*', function($view2)
       {
        $data=Childcategory::all(); 
        View::share('childcategories', $data);
       });

       View::composer('*', function($view3)
       {
        $data=Menuvisibility::all(); 
        View::share('visibility', $data);
       });

       View::composer('*', function($view4)
       {
        $data=Topbarcontact::all(); 
        View::share('topbarcontact', $data);
       });

       View::composer('*', function($view5)
       {
        $data=Submenu::all(); 
        View::share('submenu', $data);
       });
    }
}
