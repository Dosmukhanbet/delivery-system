<?php

namespace App\Http\Controllers;

use App\City;
use App\Shop;
use App\Product;
use App\ShopCategory;
use Illuminate\Http\Request;

class ShopsController extends Controller
{

    /**
    * Show all shops
    */
    public function index(City $city, ShopCategory $category)
    {
    	$shops = $category->shops()
    					  ->where('city_id', $city->id)
    					  ->paginate(15);
    	return view('shops.index', compact('shops', 'city'));
    }

    /**
     * 
     */
     public function show(City $city,Shop $shop)
     {
     	
        return view('shops.show',
		     		[ 
		     		   'products' => $shop->products,
		     		   'shop'	  => $shop,
		     		   'city' 	  => $city,
		     		   'groupedproducts' => $shop->products->groupBy('product_categories_id')
		     		]);
     }  
}
