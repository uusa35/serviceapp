<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

	//
    protected $table = 'types';
    protected $guard = ['created_at','updated_at'];

}
