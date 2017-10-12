<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Role extends Model
{
    protected $fillable = array('name','is_active','created_by','created_at','updated_by','updated_at');
	
	/**
     * Get the role record associated with the user.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
