<?php

use Illuminate\Database\seeder;
use Elihans\Teacher;
use Elihans\User;

class TeacherTableSeeder extends Seeder {

    public function run()
    {
        Teacher::truncate();

        $faker = \Faker\Factory::create();

        foreach(range(1, 10) as $range) {
            $teacher = Teacher::create(array(
                'name' => $faker->name,
                'gender' => 'male',
                'class_id' => $faker->numberBetween(1, 11),
                'class_type_id' => $faker->numberBetween(1,5),
                'teacher_reg' => 'ELH'.rand(100, 999),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
            ));

            User::create(array(
                'username'=> $teacher->teacher_reg,
                'userable_id'=>$teacher->id,
                'userable_type'=>"Elihans\\Teacher"
            ));
        }
    }
}
