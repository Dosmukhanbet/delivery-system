<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['name', 'short_name'];
    public $timestamps = false;
     
}
