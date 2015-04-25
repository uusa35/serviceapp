<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateRequest extends Request {

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
			'description'	=> 'required|min:5',
			'time'			=> 'required',
			'date'			=> 'required'
		];
	}

}
