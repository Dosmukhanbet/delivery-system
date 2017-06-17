<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'map_coordinates', 'city_id'];

    public $timestamps = false;

    
    public function city ()
    {
    	return $this->belongsTo(City::class);
    } 
    
}
