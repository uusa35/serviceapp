<?php
/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 2/19/2015
 * Time: 5:57 PM
 */

use Illuminate\Database\Seeder as Seeder;
use App\User;

class UsersTableSeeder extends Seeder {


    public function run () {

        DB::table('Users')->truncate();
        $faker = Faker\Factory::create();

            User::create([
                'name'              => $faker->name(),
                'email'             => 'uusa35@gmail.com',
                'password'          => Hash::make('123'),
                'area'              => $faker->word(1),

            ]);
            User::create([
                'name'              => $faker->name(),
                'email'             => 'test@test.com',
                'password'          => Hash::make('123'),
                'area'              => $faker->word(1),

            ]);

        $this->command->info('User table seeded!');
    }

}