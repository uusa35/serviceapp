<?php namespace App\Events;


use Illuminate\Queue\SerializesModels;
use App\Acme\Users\UsersProfessionsRepository;
use App\Acme\Users\UsersTypesRepository;

class UserRegisterEvent extends Event {

	use SerializesModels;

	public $profession_id;
	public $user_id;
	public $userType;
	public $professionType;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */

	public function __construct($request,$user_id)
	{
		//
		$this->type_id = $request->get('type_id');
		$this->profession_id = $request->get('profession_id');
		$this->user_id = $user_id;
		dd('working from hundler');
	}

	public function handle(UsersTypesRepository $userType, UsersProfessionsRepository $userProfession) {

		$this->userType = $userType;
		$this->professionType = $userProfession;
		$this->professionType->postProfessionId($this->profession_id,$this->user_id);
		$this->userType->posTypeId($event->type_id,$event->user_id);
	}

}
