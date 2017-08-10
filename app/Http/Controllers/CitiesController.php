<?php

namespace App\Http\Controllers;

use App\City;
use App\Group;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class CitiesController extends Controller
{
    
    
    public function show(City $city)
    {
    	$month = Carbon::now()->addMonth();

        $key = str_replace(".", '-' ,request()->ip());
       
        session([$key => $city->slug]);
        
        // session()->flush();

    	if ( ! cache('groups') ) 
    	{
    	  cache(['groups' => Group::with('shopCategories')->get()], $month);
    	}
    	return view('cities.main')
    			   ->with('city', $city)
    	           ->with('groups', cache('groups'));

    } 

   
}
