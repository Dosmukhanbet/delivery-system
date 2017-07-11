<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Mail\NewPartnershipRequest;
use Illuminate\Support\Facades\Mail;

class PartnershipController extends Controller
{
    /**
    * 
    */
    public function offer ()
    {
    	return view('partnership.offer');
    } 

    /**
    * 
    */
    public function store ()
    {
    	if(request()->expectsJson()){
    		$admin = User::whereType('admin')->first();
    		$data = [
    		'name' => request('name'),
    		'company_name' => request('companyName'),
    		'mobilenumber' => request('mobilenumber')
    		];

    		Mail::to($admin)->send(new NewPartnershipRequest($data));

    		return 'Запрос на подключение к системе получен, в ближайшее время наш специалисты свяжутся с вами для уточнения деталей';
    		
    	}
    } 
}
