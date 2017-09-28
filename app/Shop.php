<?php

namespace App;

use App\City;
use App\User;
use App\Order;
use App\Product;
use App\Feedback;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name', 'brand_name', 'slug', 'email', 'min_order', 'delivery_time', 'description', 'open_time', 'close_time', 'photo_path', 'thumbnail_path', 'user_id', 'city_id', 'shop_categories_id', 'active', 'address', 'products'];

    protected $with = ['rates'];

    
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    } 

    public function city()
    {
        return $this->belongsTo(City::class);
    } 

    public function shopcategories ()
    {
    	return $this->belongsToMany(ShopCategory::class);
    } 

    /**
    * Shop has many Rates
    */
    public function rates()
    {
    	return $this->hasMany(Rate::class);
    }

    /**
     * Shop has many products
     */
     public function products()
     {
     	return $this->hasMany(Product::class);
     } 

     // shop orders
     public function orders()
     {
        return $this->hasMany(Order::class);
     }  

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    } 
 

    public function getRouteKeyName()
	{
	    return 'slug';
	}


	public function getOpenTimeAttribute($value)
    {
    	return date('H:i', strtotime($value));
    } 

    public function getCloseTimeAttribute($value)
    {
    	return date('H:i', strtotime($value));
    } 
}
