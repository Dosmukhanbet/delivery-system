<?php

namespace App;

use App\City;
use App\User;
use App\Feedback;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'user_id', 'city_id', 'email', 'ip_address', 'delivery_address', 'photo_path'];

    public function city ()
    {
    	return $this->belongsTo(City::class);
    } 

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    
    public function feedbacks()
    {
    	return $this->hasMany(Feedback::class);
    } 
    
    
}
