<?php namespace App\Handlers\Events;

use App\Events;
use App\Acme\Users\UsersProfessionsRepository;
use App\Acme\Users\UsersTypesRepository;
use App\Events\UserRegisterEvent;

class UserRegisterHandler {

	public $userType;
	public $professionType;
	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
		dd('working');

	}

	/**
	 * Handle the event.
	 *
	 * @param  UserRegisterEvent  $event
	 * @return void
	 */
	public function handle(UserRegisterEvent $event)
	{
		//
		dd($event.'From the handler :)');
		$this->professionType->postProfessionId($event->profession_id,$event->user_id);
		$this->userType->posTypeId($event->type_id,$event->user_id);
	}

}
