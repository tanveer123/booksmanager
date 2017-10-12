<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    protected $fillable = array('rack_id','title','author','pub_year','is_active','created_by','created_at','updated_by','updated_at');

    /*Method to get parent rack of some book*/
    public function rack()
    {
        return $this->belongsTo('App\Rack');
    }
}
