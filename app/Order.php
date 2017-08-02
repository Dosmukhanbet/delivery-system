<?php

namespace App;

use App\Shop;
use App\User;
use App\Feedback;
use App\OrderProduct;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	 protected $fillable = ['total', 'delivery_status', 'delivery_address', 'delivery_cost','product_id', 'user_id', 'shop_id', 'city_id'];
	 protected $casts = [ 'total' => 'integer', 'delivery_cost' => 'integer'];
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

    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }

    
    public function items ()
    {
          return $this->hasMany(OrderProduct::class, 'order_id');
    }   
    
}
