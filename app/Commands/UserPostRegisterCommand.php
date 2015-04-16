<?php namespace App\Commands;

use App\Commands\Command;
use App\Acme\Users\UsersProfessionsRepository;
use App\Acme\Users\UsersTypesRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class UserPostRegisterCommand extends Command implements SelfHandling {

	public $profession_id;
	public $user_id;
	public $userType;
	public $userProfession;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($request,$user_id)
	{
		//
		$this->type_id = $request->get('type_id');
		$this->profession_id = $request->get('profession_id');
		$this->user_id = $user_id;

	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(UsersProfessionsRepository $userProfession, UsersTypesRepository $userType)
	{
		//
		$this->userType = $userType;
		$this->userProfession = $userProfession;
		$this->userProfession->postProfessionId($this->profession_id,$this->user_id);
		$this->userType->postTypeId($this->type_id, $this->user_id);
	}

}
