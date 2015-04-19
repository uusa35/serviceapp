<?php namespace App\Http\Middleware;

use App\Http\Requests\ResponseRequest;
use Closure;
use Illuminate\Support\Facades\Validator;
use App\Acme\Api\ApiMethods;

class BeforePostResponseRequest {

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
		$requestValidate = new ResponseRequest();
		$validator = Validator::make($request->all(),$requestValidate->rules());

		if($validator->fails()) {
			//return 'failure to complete the request';
			return $this->getJsonResponse($validator->messages());
		}
		return $next($request);
	}

}
