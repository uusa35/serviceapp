<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model {

	//
    protected  $table = 'users_types';
    protected $fillable = ['user_id', 'type_id'];


}
