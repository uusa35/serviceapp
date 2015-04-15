<?php namespace App\Http\Requests;

use App\Http\Controllers\Api\ApiController;


class CreateOrderRequest extends Request {


	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			//
			'provider_id' 	=> 'required|integer',
			'customer_id'	=> 'required|integer',
			'time'			=> 'required',
			'date'			=> 'required'
		];
	}


}
