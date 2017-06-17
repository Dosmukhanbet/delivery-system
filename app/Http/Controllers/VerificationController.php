<?php

namespace App\Http\Controllers;

use App\Services\SMS;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
	protected $smsAPI;

	public function __construct(SMS $smsAPI)
	{
	    $this->smsAPI = $smsAPI;
	}

    /**
    * VERIFY 
    */
    public function verify()
    {

    	$code = rand(10000, 99999);
    	
    	
	    $this->smsAPI->send(request('phoneNumber'), $code);
	    	
    	
    }


}
