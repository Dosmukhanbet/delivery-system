<?php

namespace App\Http\Controllers;

use App\City;
use App\Group;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    
    
    public function show(City $city)
    {
    	$groups = Group::with('shopCategories')->get();

    	return view('cities.show', compact('city', 'groups'));
    } 
}
