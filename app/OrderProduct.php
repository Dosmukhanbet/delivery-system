<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
	protected $fillable = ['order_id', 'product_id', 'quantity'];
    public $timestamps = false;

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

}
