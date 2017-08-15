<?php

namespace App\Http\Controllers;

use App\Services\SMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class VerificationController extends Controller
{
	protected $smsAPI;

	public function __construct(SMS $smsAPI)
	{
	    $this->smsAPI = $smsAPI;
	}

    /**
    * VERIFY NUMBER
    */
    public function verify()
    {
    	$code = rand(10000, 99999);
    	
	    $this->smsAPI->send(request('phoneNumber'), $code);
	    	
    }

    
    public function verifyForApi ()
    {
        if( ! preg_match('/(\+7)[0-9]{10}/',request('phoneNumber')) ) 
        {
            return Response::json([
                'message' => 'Введите номер в формате +7хххххххххх'
                ],422);

        }
        
        $this->verify();
    } 


}
