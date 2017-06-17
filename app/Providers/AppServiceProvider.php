<?php

namespace App\Providers;

use App\City;
use App\Unit;
use App\Group;
use App\District;
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

        view()->composer(['shopadmin.products', 'shopadmin.forms.createproduct'], function($view){
            $view->with('units', Unit::all())
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

         view()->composer('admin.shops', function($view){
            $view->with('cities', City::all())
                 ->with('shopcategories', ShopCategory::all());
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
