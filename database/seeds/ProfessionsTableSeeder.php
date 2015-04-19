<?php

/**
 * Created by PhpStorm.
 * User: usama_000
 * Date: 2/19/2015
 * Time: 5:57 PM
 */

use Illuminate\Database\Seeder as Seeder;
use App\Profession;

class ProfessionsTableSeeder extends Seeder {


    public function run () {

        DB::table('professions')->truncate();
        //$faker = Faker\Factory::create();
        $professions = ['plumber','electrician','mechanical','Carpenter','Typist','Civil Engineer',
        'Doctor','Driver','Graphic Designer','PHP Developer', 'IOS Developer'
        ];

        for($i=0;$i<= count($professions);$i++) {
            Profession::create([
                'profession' => $professions[$i]
            ]);
        }
        $this->command->info('Requests table seeded!');
    }

}