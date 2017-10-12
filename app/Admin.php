<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','name','username', 'phone', 'email', 'password','created_by','created_at','updated_by','updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public static function user($id)
    {
        if($id) {
            $users = \DB::select('select * from admins where id=' . $id);
            $user = '';
            if ($users)
                $user = $users[0];
            if (!empty($user))
                return $user->name;
            else
                return 'N/A';
        }
        else
            return 'N/A';
    }
}
