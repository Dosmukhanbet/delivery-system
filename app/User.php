<?php

namespace App;

use App\Shop;
use App\Order;
use App\Customer;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'mobile_number', 'password', 'remember_token', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    
    public function shops()
    {
        return $this->hasMany(Shop::class);
    } 

    // Customer user orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    } 

    /**
    * 
    */
    public function shopOrders()
    {
        return $this->hasManyThrough(Order::class, Shop::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Shop::class);
    }  
}
