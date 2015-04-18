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
			$table->tinyInteger('provider_id')->unsigned();
			$table->tinyInteger('provider_response')->default('0')->unsigned(); // 0-1-2 pending / approval / rejection
			$table->tinyInteger('customer_id')->unsigned();
			$table->string('description');
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
