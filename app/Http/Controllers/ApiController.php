<?php

namespace App\Http\Controllers;

use App\City;
use App\Shop;
use App\ShopCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

	public function __construct()
	{
	             
	}  

	public function categories()
    {
    	return ShopCategory::all();
    }  

    public function shops(City $city)
    {
    	
    	return $shops = Shop::where('city_id', $city->id)
    				 ->get(['name', 'slug' , 'city_id']);

    } 
}
