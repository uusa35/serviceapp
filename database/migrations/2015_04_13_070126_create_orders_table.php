<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('customer_id')->unsigned();
			$table->integer('provider_id')->unsigned();
			$table->date('date');
			$table->time("time");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('orders');
	}

}

