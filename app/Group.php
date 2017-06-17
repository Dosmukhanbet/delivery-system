<?php

namespace App;

use App\ShopCategory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'slug', 'photo_path', 'thumbnail_path'];

    public $timestamps = false;

    public function shopCategories()
    {
    	return $this->hasMany(ShopCategory::class);
    } 

}
