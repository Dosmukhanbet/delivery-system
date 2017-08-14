<?php

namespace App\Http\Controllers;

use App\City;
use App\Shop;
use Illuminate\Http\Request;

class ApiController extends Controller
{

	public function __construct()
	{
	             
	}

    public function shops(City $city)
    {
    	return Shop::where('city_id', $city->id)->get(['name', 'slug', 'city_id', 'photo_path']);
    } 
}
