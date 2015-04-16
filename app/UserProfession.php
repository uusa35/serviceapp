<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfession extends Model {

	//
    protected $table = 'users_professions';
    protected $fillable = ['user_id','profession_id'];

}
