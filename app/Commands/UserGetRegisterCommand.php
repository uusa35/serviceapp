<?php namespace App\Commands;

use App\Acme\Types\ProfessionRepository;
use App\Acme\Types\TypeRepository;
use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Response;


class UserGetRegisterCommand extends Command implements SelfHandling {

	public $profession;
	public $type;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//

	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(ProfessionRepository $profession, TypeRepository $type)
	{
		//
		$this->profession = $profession->getAll();
		$this->type = $type->getAll();

		return Response::json([
			'elements' => [
				'items' => [
					'types' => $this->type,
					'professions' => $this->profession
				]
			]
		],200);
	}

}
