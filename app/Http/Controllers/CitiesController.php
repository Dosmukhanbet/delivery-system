<?php

namespace App\Http\Controllers;

use App\City;
use App\Group;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class CitiesController extends Controller
{
    
    
    public function show(City $city)
    {
    	$month = Carbon::now()->addMonth();

    	if ( ! cache('groups') ) 
    	{
    	  cache(['groups' => Group::with('shopCategories')->get()], $month);
    	}

    	return view('cities.main', compact('city'))->with('groups', cache('groups'));

    } 
}
