<?php namespace App\Http\Controllers\Api;


use App\Acme\Api\ApiMethods;
use App\Acme\Orders\OrderRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

<<<<<<< HEAD
class OrderController extends Controller{
=======

class OrderController extends Controller {
>>>>>>> 5db679a83c980a275be2167fc6fb7dd2c1518e12

	use ApiMethods;

	public $order;
	public function __construct(OrderRepository $order) {
		$this->order = $order;
		$this->middleware('order.store',['only'=>'store']);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$allOrders = $this->order->model->paginate(8);
		return $this->getJsonSuccess($allOrders->toArray());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		dd('procceed to store method');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$SingleOrder = $this->order->findById($id);
		if ( ! $SingleOrder) {
			return $this->getJsonFailure('This Order does not exist !!!');
		}
		return $this->getJsonSuccess($SingleOrder->toArray());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
