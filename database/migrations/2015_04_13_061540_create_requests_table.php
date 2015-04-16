<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('requests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('provider_id')->unsigned();
			$table->integer('provider_response')->default('0')->unsigned(); // 0-1-2
			$table->integer('customer_id')->unsigned();
			$table->integer('customer_view')->default('0')->unsigned();
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
		Schema::drop('requests');
	}

}
