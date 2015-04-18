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

/*
 * PROVIDER
 * inbox
 * 	all pending requests
 * sent
 * all approved & rejected requests
 *
 *
 * CUSTOMERS
 * All Providers Page
 * 	btn Create a Request
 * 	a form to specify the date + time + description
 * inbox
 * 	all requests that are approved by a provider
 * sent
 * all requests made by the customer no matter the response is
 * */

//Route::get('/', 'WelcomeController@index');
//
//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix'=>'api','middleware'=>'auth.basic'], function () {

	// route to get a provider requests
	Route::get('requests/provider/{id}/{status}','Api\RequestController@getProvider');
	// route to get a customer approved requests - will appear in the Customer Inbox
	Route::get('requests/customer/{status}','Api\RequestController@getCustomer');
	// route for a customer creating new request
	Route::post('requests/customer/create','Api\RequestController@postCreateRequest');
	// route to show a request
	Route::get('requests/{id}','Api\RequestController@getShowRequest');
	// show all providers - Create A Request Page
	Route::resource('providers','Api\ProviderController',['only'=>'index']);


});