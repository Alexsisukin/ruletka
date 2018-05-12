<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'games';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user','case', 'win_item', 'code', 'status'];

    protected $columns = array('user','case','win_item', 'code', 'status','created_at','updated_at'); // add all columns from you table

    public function scopeExclude($query,$value = array())
    {
        return $query->select( array_diff( $this->columns,(array) $value) );
    }
}
