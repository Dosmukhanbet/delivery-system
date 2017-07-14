<?php

namespace App;

use App\Shop;
use App\Unit;
use App\ProductCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'photo_path','description', 'thumbnail_path', 'unit_id', 'shop_id', 'product_categories_id', 'is_active'];

    protected $with = ['productCategory' , 'owner', 'unit'];

    /**
    * product belongs to shop
    */
    public function owner()
    {
    	return $this->belongsTo(Shop::class, 'shop_id');
    }

    /*
    * order_products pivot table. 
    */ 
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products');
    } 

    
    public function productCategory()
    {
    	return $this->belongsTo(ProductCategory::class,'product_categories_id');
    }


    public function unit()
    {
    	return $this->belongsTo(Unit::class);
    } 

    
    // public function getPriceAttribute($value)
    // {
    //     return $value + ((5 / 100) * $value);
    // } 
    
}
