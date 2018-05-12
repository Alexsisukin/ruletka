<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class PromoUse extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'promo_use';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user','code'];

    public $timestamps = false;

}
