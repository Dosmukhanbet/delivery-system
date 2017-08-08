<?php

namespace App\Http\Controllers;

use App\Shop;
use App\User;
use App\Order;
use App\Customer;
use App\OrderProduct;
use Illuminate\Http\Request;
use App\Events\OrderWasCreated;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{	
	protected $user;

    
     // STORE NEW ORDER
    public function store()
    {
    	$user = User::where('mobile_number', request('mobilenumber'))->first();
    	
    	
        $this->user = $user ? Auth::loginUsingId($user->id, true) : $this->createCustomer();
    	
    	
    	return $this->createOrder($this->user);

    }

    	
    public function createCustomer()
    {
    	$user = User::create([
    			'name'     		=> request('username'),
    			'mobile_number' => request('mobilenumber'),
    			'type' 			=> 'customer', 
    			'password'  	=> bcrypt(request('password')),
                'api_token'     => str_random(60)
    		]);

        Auth::loginUsingId($user->id, true);

    	Customer::create([
    		'user_id' => $user->id,
    		'delivery_address' => request('address'), 
    		'city_id' => request('cityId'),
    		'email'  => request('email') ?: null,
    		'ip_address' => request()->ip()
    		]);

    	return $user;
    } 
             
    public function createOrder(User $user)
    {
    	$order = Order::create([
    		'total'=> request('totalWithDelivery'),
    		'delivery_status' => 0,
    		'delivery_address'=> request('address'),
    		'delivery_cost'=> request('deliveryCost'),
    		'user_id'=> $user->id,
    		'shop_id'=> request('shopId'),
    		'city_id'=> request('cityId')
    		]);

    	foreach (request('products') as $product) {
    		// return $product;
    		OrderProduct::create([
    			'order_id' => $order->id,
    			'product_id' => $product['productId'],
    			'quantity'	=> $product['amount']
    			]);
    	}

        event(new OrderWasCreated($order));
    } 
}
