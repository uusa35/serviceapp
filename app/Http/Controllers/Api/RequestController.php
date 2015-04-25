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
		$this->middleware('post.response.request', ['only'=>'postUpdateResponseRequest']);
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
			return $this->getJsonResponse('No Requests !!');
		}
		return $this->getJsonSuccess($requestProvider,'200');

	}

	public function getCustomer($status) {
		// all inbox for customer according to status 0 - 1 - 2
		$requestCustomer = $this->requestRepo->getCustomerRequests($status)->toArray();
		if (! $requestCustomer) {
			return $this->getJsonResponse('No Requests !!');
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
		/*
		 *  refere to the middle ware that will be applied before procceed in that request ..
		 * in the middle ware the request instance of CreateRequest is instanitated for rules
		 * validator will be made ..
		 * if success the $request will be be forward
		 * if rejection error message is delivered
		 */

		$request = array_add($request,'customer_id',Auth::id());
		$request = array_add($request, 'provider_response','0');

		if(! $this->requestRepo->model->create($request->all())) {
			return $this->getJsonResponse('Can not create Request !!');
		}

		return $this->getJsonResponse('Request Created successfully !!','200');

	}

	public function postUpdateResponseRequest(Request $request) {

		$provider_id = $request->get('provider_id');
		$request_id = $request->get('id');
		$provider_response = $request->get('provider_response');


		if(! $this->requestRepo->updateResponse($provider_id,$provider_response,$request_id)) {
			return $this->getJsonResponse('Can not update Request !!');
		}

		return $this->getJsonResponse('Response Request updated successfully !!','200');

	}


}
