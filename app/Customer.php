<?php

namespace App;

use App\City;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'user_id', 'city_id', 'email', 'ip_address', 'delivery_address'];

    public function city ()
    {
    	return $this->belongsTo(City::class);
    } 

     public function user()
    {
    	return $this->belongsTo(User::class);
    } 
    
    
}
