<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = str_replace(".", '-' ,request()->ip());
        if( ! session()->exists($key))
        {
            $cities = City::all();
            
            return view('home',compact('cities'));
        }
        else 
        {
            return redirect('cities/' . session($key));
        }   
    }
}
