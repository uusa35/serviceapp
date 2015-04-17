<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/* MIDDLEWARE + VALIDATION + REQUEST ISSUE
 * register the middleware inside the controller constructor $this->middleware('whatever',['only'=>'store'])
 * create Request for validation that includes the rule method
 * make the rule method in the Request
 * create the before/after middleware
 * inject the Request within the handler of the middleware
 * register the middleware within the kernal.php
 * validate the request rules in the handler then redirect it to whatever
 * if validation success let the clousre move to the original method within the controller itself.
 * create new instance of the request class in order to make the validation
 *
 * */
/* COMMANDS = EVENTS
 * create the command.
 * there is constructor + handler
 * within the origin method or controller we write this : $this->dispatch(TheCommand(all vars for the constructor))
 * */

//Route::get('/', 'WelcomeController@index');
//
//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix'=>'api','middleware'=>'auth.basic'], function () {

	//Route::resource('users','UserController');
	Route::resource('orders','Api\OrderController',['only'=>['index','show','store']]);
	Route::resource('requests','Api\RequestController',['only'=>['index','store','show','create']]);
	Route::resource('providers','Api\ProviderController',['only'=>'index']);


});