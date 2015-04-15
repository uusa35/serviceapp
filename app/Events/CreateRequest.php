<?php namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use App\Acme\Users\UsersProfessionsRepository;
use App\Acme\Users\UsersTypesRepository;

class CreateRequest extends Event {

	use SerializesModels;
	public  $userType;
	public $userProfession;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(UsersTypesRepository $userType, UsersProfessionsRepository $userProfession)
	{
		//
		$this->userType = $userType;
		$this->userProfession = $userProfession;
		return 'this is from inside the Events-CreateRequest construct';
	}

}
