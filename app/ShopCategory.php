<?php

namespace App;

use App\Group;
use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    protected $table = 'shopcategories';
    public $timestamps = false;

    protected $fillable = ['name', 'slug', 'photo_path', 'thumbnail_path', 'group_id'];
    
    /**
    * 
    */
    public function shops ()
    {
    	return $this->belongsToMany(Shop::class);
    } 
    /**
    * Belongs To Group
    */
    public function group()
    {
    	return $this->belongsTo(Group::class);
    }

    public function getRouteKeyName()
	{
	    return 'slug';
	} 
}
