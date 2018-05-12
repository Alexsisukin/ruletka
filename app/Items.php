<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

    protected $table = 'items';

    protected $fillable = ['name', 'price', 'type','image','case'];
    public $timestamps = false;
}
