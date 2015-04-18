<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Acme\Users\UsersTypesRepository;

use Illuminate\Http\Request;

class ProviderController extends Controller {

	public $providers;

	public function __construct(UsersTypesRepository $providers) {
		$this->providers = $providers;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// return all users subscribed as providers
		return $this->providers->getProviders();
	}


}
