<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'promo';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','limit', 'used','reward'];

    public $timestamps = false;

}
