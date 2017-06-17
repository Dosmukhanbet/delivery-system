<?php

namespace App;

use App\District;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['district_id', 'shop_id', 'cost'];
    public $timestamps = false;

    protected $with = ['district'];
    protected $casts = [ 'cost' => 'integer'];


    /**
    * 
    */
    public function district()
    {
    	return $this->belongsTo(District::class);
    }

    // public function setCostAttribute($value)
    // {
    //     return (int)$value;
    // } 

    
    
}
