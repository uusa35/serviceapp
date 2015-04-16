<?php

/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 2/19/2015
 * Time: 5:57 PM
 */

use Illuminate\Database\Seeder as Seeder;
use App\UserType;

class TypesTableSeeder extends Seeder {


    public function run () {

        DB::table('types')->truncate();
        $faker = Faker\Factory::create();

            Type::create([
                'type'              => 'provider',
            ]);
            Type::create([
                'type'              => 'customer',
            ]);
        $this->command->info('Types table seeded!');
    }

}