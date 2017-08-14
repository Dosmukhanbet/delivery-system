<?php

namespace App\Http\Controllers;

use App\City;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

	public function __construct()
	{
	             
	}    

    public function shops(City $city)
    {
    	$shops =  DB::table('shops')
            ->join('rates', 'shop_id', '=', 'rates.shop_id')
            ->get();
    	// $shops = Shop::where('city_id', $city->id)
    	// 			->pluck('name', 'city_id');

    	dd($shops);		
    } 
}
