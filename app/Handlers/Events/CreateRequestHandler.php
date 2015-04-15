<?php namespace App\Handlers\Events;

use App\Events\CreateRequest;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class CreateRequestHandler {

	/**
	 * Create the event handler.
	 * listener
	 * @return void
	 */
	public function __construct()
	{
		//

	}

	/**
	 * Handle the event.
	 *
	 * @param  CreateRequest  $event
	 * @return void
	 */
	public function handle(CreateRequest $event)
	{
		//
		echo $event.'</br>';
		return 'Event Create Request Fired !!!';
	}

}
