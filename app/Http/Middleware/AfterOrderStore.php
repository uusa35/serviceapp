<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Response;

class AfterOrderStore {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		dd($request);

		if($request) {
			return Response::json([
				'elements' => [
					'error' => $request->errors()->all()->toArray(),
					'code' => '404'
				]
			]);
		}
		return $next($request);
	}

}
