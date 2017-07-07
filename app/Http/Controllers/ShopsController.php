<?php

namespace App\Http\Controllers;

use App\City;
use App\Shop;
use App\Product;
use Carbon\Carbon;
use App\ShopCategory;
use Illuminate\Http\Request;

class ShopsController extends Controller
{

    /**
    * Show all shops
    */
    public function index(City $city, ShopCategory $category)
    {

        $key = $city->slug. '.' . $category->slug;

        if ( !cache($key)) 
        {
            $shops = $category->shops()
                          ->where('city_id', $city->id)
                          ->orderBy('rating', 'desc')
                          ->paginate(15);

            $week = Carbon::now()->addWeek(); 

            cache( [ $key => $shops ], $week);

        }

    	return view('shops.index', compact('city'))
                   ->with('shops', cache($key))
                   ->with('category', $category);
    }

    /**
     * 
     */
     public function show($cityslug, $shopslug)
     {
        $key = $cityslug. '.' . $shopslug;


        if( ! cache($key) ) 
        {
            $shop = Shop::whereSlug($shopslug)->first();

            $city = City::whereSlug($cityslug)->first();

            $month = Carbon::now()->addWeek(); 

            cache([ $shopslug.'products' => $shop->products->where('is_active', 1)], $month);
            cache([ $key => $shop ], $month);
            cache(['city' => $city ], $month);

            $shopslug = $shop->slug;
        }

     
     	
        return view('shops.show',
		     		[ 
		     		   'products' => cache($shopslug . 'products'),
		     		   'shop'	  => cache($key) ,
		     		   'city' 	  => cache('city')
		     		   // 'groupedproducts' => $shop->products->groupBy('product_categories_id')
		     		]);
     }  
}
