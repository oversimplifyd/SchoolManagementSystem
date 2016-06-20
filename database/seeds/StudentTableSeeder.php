<?php

use Illuminate\Database\seeder;
use Elihans\Student;
use Elihans\User;

class StudentTableSeeder extends Seeder {

    public function run()
    {
        Student::truncate();

        $faker = \Faker\Factory::create();

        foreach(range(1, 10) as $range) {
            $student = Student::create(array(
                'name' => $faker->name,
                'gender'=> 'male',
                'student_reg' => 'ELH'.rand(100000, 999999),
                'class_id' => $faker->numberBetween(1, 11),
                'class_type_id' => $faker->numberBetween(1, 5),
                'dob' => $faker->date(),
                'phone' => $faker->phoneNumber
            ));

            User::create(array(
                'username'=> $student->student_reg,
                'userable_id'=>$student->id,
                'userable_type'=>"Elihans\\Student"
            ));
        }
    }
}
