<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model {

	//
    protected $table = 'professions';
    protected $hidden = ['created_at', 'updated_at'];

}
