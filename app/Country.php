<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'slug', 'language'];

    public $timestamps = false;


    /**
    * App\City
    */
    public function cities ()
    {
    	return $this->hasMany(City::class);
    } 
}
