<?php namespace App\Http\Controllers\Auth;

use App\Acme\Professions\ProfessionRepository;
use App\Acme\Types\TypeRepository;
use App\Commands\UserPostRegisterCommand;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Acme\Api\ApiMethods;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/
	public $type;
	public $profession;

	use AuthenticatesAndRegistersUsers;
	use ApiMethods;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar, TypeRepository $type, ProfessionRepository $profession)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
		$this->type = $type;
		$this->profession = $profession;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getLogin() {
		return $this->getJsonResponse('Not Allowed','200');
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, array('email' => 'required|email', 'password' => 'required'));
		$credentials = $request->only('email', 'password');
		if ($this->auth->attempt($credentials, true)) {
			return $this->getJsonResponse('Login Success !!','200');
			// return redirect()->intended($this->redirectPath());
		}
		//return redirect($this->loginPath())->withInput($request->only('email', 'remember'))->withErrors(array('email' => $this->getFailedLoginMessage()));
		return $this->getJsonResponse('Wrong Username or Password !!!', '200');
	}

	public function getRegister() {
		$types = $this->type->getAll()->toArray();
		$professions = $this->profession->getAll()->toArray();

		return $this->getJsonSuccess(['types'=> $types, 'professions'=> $professions],200);
	}


	public function postRegister(Request $request, Dispatcher $event)
	{
		$validator = $this->registrar->validator($request->all());
		if ($validator->fails()) {
			//$this->throwValidationException($request, $validator);
			return $this->getJsonResponse($validator->messages(),'PREG-10');
		}
		$this->auth->login($this->registrar->create($request->all()));
		$this->dispatch(new UserPostRegisterCommand($request,Auth::id()));

		return $this->getJsonResponse('Registeration Success','200');
		//return redirect($this->redirectPath());
	}

}
