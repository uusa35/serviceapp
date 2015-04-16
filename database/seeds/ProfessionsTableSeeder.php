<?php

/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 2/19/2015
 * Time: 5:57 PM
 */

use Illuminate\Database\Seeder as Seeder;
use App\UserType;

class ProfessionsTableSeeder extends Seeder {


    public function run () {

        DB::table('professions')->truncate();
        //$faker = Faker\Factory::create();

            Type::create([

                'profession'           => 'plumber'
            ]);
            Type::create([

                'profession'           => 'carpenter'
            ]);
            Type::create([

                'profession'           => 'programmer'
            ]);
        $this->command->info('UsersTypes table seeded!');
    }

}