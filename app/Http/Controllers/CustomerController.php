<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Order;
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

    
    public function updateOrderDeliveryStatus ()
    {
        $order = Order::find(request('orderId'))->first();
        $order->delivery_status = ! $order->delivery_status;
        $order->update();

        if(request()->expectsJson())
        {
          return $order->delivery_status ? response(['status' => 'Статус доставки обновлен на - Доставлено!']):
           response(['status' => 'Статус доставки обновлен на - Не Доставлено!']);
        }


    }   

}
