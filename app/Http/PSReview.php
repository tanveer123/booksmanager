<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class PSReview extends Model
{
    protected $fillable = array('p_service_id','name','phone','email','message','question1','question2','question3','question4','question5','question6','is_active','is_deleted','created_by','created_at','updated_by','updated_at');

    public $timestamps = false;

    protected $table = 'services_reviews';

    public function pservice()
    {
        return $this->belongsTo('App\PService', 'p_service_id');
    }
}