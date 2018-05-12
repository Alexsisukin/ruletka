<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $table = 'stock';

    protected $fillable = ['type', 'key', 'case','game'];
    public $timestamps = false;
}
