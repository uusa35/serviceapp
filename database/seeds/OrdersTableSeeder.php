<?php
/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 2/19/2015
 * Time: 5:57 PM
 */

use Illuminate\Database\Seeder as Seeder;
use App\Order;


class OrdersTableSeeder extends Seeder {


    public function run () {

        DB::table('orders')->truncate();
        $faker = Faker\Factory::create();
        for($i=0;$i<=5;$i++) {
            Order::create([
                'customer_id'       => $faker->numberBetween(1,1),
                'provider_id'       => $faker->numberBetween(2,2),
                'date'              => $faker->date('Y-m-d','now'),
                'time'              => $faker->time('H:i:s','now')
            ]);
        }
        $this->command->info(' Orders table seeded!');
    }

}