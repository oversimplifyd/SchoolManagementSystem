<?php

use Illuminate\Database\seeder;
use Elihans\Guardian;
use Elihans\User;

class GuardianTableSeeder extends Seeder {

    public function run()
    {
        Guardian::truncate();

        $faker = \Faker\Factory::create();

        foreach(range(1, 3) as $range) {
            $guardian = Guardian::create(array(
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'child_reg' => $faker->unique()->userName,
            ));

            User::create(array(
                'username'=> $faker->unique()->userName,
                'password'=> bcrypt("password"),
                'userable_id'=>$guardian->id,
                'userable_type'=>"Elihans\\Guardian"
            ));
        }
    }
}