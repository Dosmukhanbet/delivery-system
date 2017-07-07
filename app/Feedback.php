<?php

namespace App;

use App\Shop;
use App\Order;
use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    
    public function order()
    {
    	return $this->belongsTo(Order::class);
    } 

    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }

    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    }  
}
