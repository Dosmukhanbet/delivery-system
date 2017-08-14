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
    	return ShopCategory::all(['id' ,'name', 'slug', 'photo_path', 'thumbnail_path']);
    }  

    public function shops(City $city)
    {
    	return Shop::where('city_id', $city->id)
    				 ->get(['name', 'slug' , 'city_id']);
    }

    public function cities()
    {
        return City::all(['id', 'name' , 'slug']);
    } 

    
    
}
