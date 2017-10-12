<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Rack extends Model
{
    protected $fillable = array('name','is_active','created_by','created_at','updated_by','updated_at');

    /*Method to get child books of some rack*/
    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
