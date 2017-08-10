<?php

namespace App\Providers;

use App\City;
use App\Unit;
use App\Group;
use App\District;
use Carbon\Carbon;
use App\ShopCategory;
use App\ProductCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $hour = Carbon::now()->addHour();
        $day = Carbon::now()->addDay();
        $week = Carbon::now()->addWeek();
        

        view()->composer(['shopadmin.products', 'shopadmin.forms.createproduct'], function($view){
            if( ! cache('units') )
            {
                $month = Carbon::now()->addMonth();
                cache(['units' => Unit::all()], $month);
            }    

            // cache('units') ? cache('units') : cache(['units' => Unit::all()]);

            $view->with('units', cache('units'))
                 ->with('categories', ProductCategory::all());
        });


        view()->composer('admin.manage', function($view){
            $view->with('units', Unit::all())
                 ->with('productcategories', ProductCategory::all())
                 ->with('cities', City::all())
                 ->with('groups', Group::all())
                 ->with('shopcategories', ShopCategory::all())
                 ->with('districts', District::all());
        });
        
         $cities = City::all();
         view()->composer('admin.shops', function($view) use($cities) 
         {
            $view->with('cities', $cities)
                 ->with('shopcategories', ShopCategory::all());
         });

         view()->composer('partials.new.select_city', function($view) use($cities)
         {
            $view->with('cities', $cities);
         });

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
