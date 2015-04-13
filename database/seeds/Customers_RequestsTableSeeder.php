<?php
/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 2/19/2015
 * Time: 5:57 PM
 */

use Illuminate\Database\Seeder as Seeder;
use App\CustomerRequest;

class Customers_RequestsTableSeeder extends Seeder {


    public function run () {

        DB::table('customers_requests')->truncate();
        $faker = Faker\Factory::create();
        for($i=0;$i<=20;$i++) {
            CustomerRequest::create([
                'provider_response' => $faker->numberBetween(0,2),
                'customer_view'     => $faker->numberBetween(0,1),
                'date'              => $faker->date('Y-m-d','now'),
                'time'              => $faker->time('H:i:s','now')
            ]);
        }
        $this->command->info('Customer Requests table seeded!');
    }

}