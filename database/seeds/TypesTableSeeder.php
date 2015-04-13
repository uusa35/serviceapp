<?php

/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 2/19/2015
 * Time: 5:57 PM
 */

use Illuminate\Database\Seeder as Seeder;
use App\Type;

class TypesTableSeeder extends Seeder {


    public function run () {

        DB::table('types')->truncate();
        $faker = Faker\Factory::create();
        for($i=0;$i<=1;$i++) {
            Type::create([
                'type'              => $faker->word(1),
            ]);
        }
        $this->command->info('Types table seeded!');
    }

}