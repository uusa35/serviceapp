<?php namespace App\Http\Middleware;

use App\Acme\Api\ApiMethods;
use App\Http\Requests\CreateOrderRequest;
use Closure;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class BeforeOrderStore extends  ApiController{

	use ApiMethods;
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// to create a before middleware for store method
		// too instantiate the FormRequest in order to use all Inputs
		// to validate within the middleware
		// to return the json customized function
		// if validation success .. to proceed in the store method :)
		$requestValidate = new CreateOrderRequest();
		$validator = Validator::make($request->all(),$requestValidate->rules());

		if($validator->fails()) {
			//return 'failure to complete the request';
			return $this->getJsonResponse($validator->messages());
		}

		return $next($request);
	}

}
