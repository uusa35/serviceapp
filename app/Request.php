<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model {

	//
    protected $table = 'requests';
    public $fillable = ['provider_id','customer_id','date','time','description','provider_response'];
    protected $hidden = ['created_at','updated_at'];


}
