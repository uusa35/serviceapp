<?php namespace App\Http\Controllers\Api;


use App\Acme\Users\UserRepository;
use App\Acme\Requests\RequestsRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Acme\Api\ApiMethods;

class RequestController extends Controller {

	public $requestRepo;

	use ApiMethods;

	public function __construct(RequestsRepository $request) {

		$this->customer = Auth::id();
		$this->requestRepo = $request;
		$this->middleware('post.create.request',['only'=>'postCreateRequest']);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getProvider($provider_id,$status)
	{
		// all pending requests for a provider == 0 pending / 1 approved / 2 rejected
		$requestProvider = $this->requestRepo->getProviderRequests($provider_id,$status)->toArray();
		if(!$requestProvider) {
			return $this->getJsonResponse();
		}
		return $this->getJsonSuccess($requestProvider,'200');

	}

	public function getCustomer($status) {
		// Inbox for Customer : all approved requests only == 1
		$requestCustomer = $this->requestRepo->getCustomerRequests($status)->toArray();
		if (! $requestCustomer) {
			return $this->getJsonResponse();
		}
		return $this->getJsonSuccess($requestCustomer,'200');

	}

	/**
	 * show
	 *
	 * @return Response
	 */
	public function getShowRequest($id)
	{
		//
		return $this->getJsonSuccess($this->requestRepo->getRequest($id));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreateRequest(Request $request)
	{
		// provider_id
		$request = array_add($request,'customer_id',Auth::id());
		$request = array_add($request, 'provider_response','0');

		if(! $this->requestRepo->model->create($request->all())) {
			return $this->getJsonResponse('Can not create Request !!');
		}

		return $this->getJsonResponse('Request Created successfully !!','200');

	}


}
