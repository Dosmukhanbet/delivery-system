<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Feedback;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
    * 
    */
    public function orders ()
    {
    	$orders = auth()->user()->orders;
    	return view('customers.orders')
    	           ->with('orders', $orders->load('items.product', 'feedback'));
    }

    public function profile ()
    {
    	return view('customers.profile')->with('user', auth()->user());
    } 
        
    public function saveFeedback()
    {
      	 $this->validate(request(), [
            'body' => 'required'
        ]);

      	$feedback = new Feedback;
      	$feedback->body = request('body');
      	$feedback->shop_id = request('shop');
      	$feedback->customer_id = request('customer');
      	$feedback->order_id = request('order');
      	$feedback->save();

      	$shop = Shop::find(request('shop'))->increment('rating', 5);

    }   

}
