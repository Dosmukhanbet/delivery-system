<?php

namespace App;

use App\Shop;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	 protected $fillable = ['total', 'delivery_status', 'delivery_address', 'delivery_cost','product_id', 'user_id', 'shop_id', 'city_id'];
	 protected $casts = [ 'total' => 'integer'];
     protected $with = ['shop'];

    public function user()
    {
        return $this->belongsTo(User::class);
    } 

    
    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    } 

    public function products ()
    {
    	return $this->belongsToMany(Product::class, 'order_products')->withPivot('quantity');
    } 
    
}
