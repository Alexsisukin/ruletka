<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model{

	 protected $table = 'cases';

	 protected $fillable = ['name','price', 'type', 'image'];

    public $timestamps = false;

}
