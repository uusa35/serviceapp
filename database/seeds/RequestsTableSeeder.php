<?php

/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 2/19/2015
 * Time: 5:57 PM
 */

use Illuminate\Database\Seeder as Seeder;
use App\Request;

class RequestsTableSeeder extends Seeder {


    public function run () {

        DB::table('requests')->truncate();
        $faker = Faker\Factory::create();
        for($i=0;$i<=20;$i++) {
            Request::create([
                'provider_id' => '1',
                'provider_response' => $faker->numberBetween(0,2),
                'customer_id' => '2',
                'description' => $faker->sentence(3),
                'date' => $faker->date('Y-m-d'),
                'time' => $faker->time('H:i:s'),
            ]);
        }
        $this->command->info('Types table seeded!');
    }

}