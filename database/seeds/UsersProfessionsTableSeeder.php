<?php

/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 2/19/2015
 * Time: 5:57 PM
 */

use Illuminate\Database\Seeder as Seeder;
use App\UserType;

class UsersProfessionsTableSeeder extends Seeder {


    public function run () {

        DB::table('users_professions')->truncate();
        $faker = Faker\Factory::create();

            Type::create([
                'user_id'              => 0,
                'profession'           => 'plumber'
            ]);
            Type::create([
                'user_id'              => 1,
                'profession'           => 'carpenter'
            ]);
        $this->command->info('User Professions table seeded!');
    }

}