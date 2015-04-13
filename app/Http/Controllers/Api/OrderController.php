<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Acme\Orders\OrderRepository;
use Illuminate\Support\Facades\Response;

class OrderController extends ApiController {

	public $order;
	public function __construct(OrderRepository $order) {
		$this->order = $order;
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
