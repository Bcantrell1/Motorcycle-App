<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = ['make', 'model', 'year', 'user_id','category_id']; 
}
