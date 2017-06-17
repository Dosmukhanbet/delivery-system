<?php

namespace App;

use App\Country;
use App\District;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'slug', 'country_id', 'timezone'];

    public $timestamps = false;

    /**
    * 
    */
    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    /**
    * District
    */
    public function districts()
    {
    	return $this->hasMany(District::class);
    }

    public function getRouteKeyName()
	{
	    return 'slug';
	}
}
