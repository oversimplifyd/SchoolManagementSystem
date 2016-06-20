<?php

use Illuminate\Database\seeder;
use Elihans\StudentClass;

class StudentClassTableSeeder extends Seeder {

    public function run()
    {
        StudentClass::truncate();

        StudentClass::create(array(
            'name' => 'PLAYGROUP',
            'group_id' => 3
        ));

        foreach(range(1, 2) as $range) {
            StudentClass::create(array(
                'name' => 'NURSERY '.$range,
                'group_id' => 3
            ));
        }

        foreach(range(1, 6) as $range) {
            StudentClass::create(array(
                'name' => 'BASIC '.$range,
                'group_id' => 3
            ));
        }

        foreach(range(1, 3) as $range) {
            StudentClass::create(array(
                'name' => 'JSS '.$range,
                'group_id' => 1
            ));
        }

        foreach(range(1, 3) as $range) {
            StudentClass::create(array(
                'name' => 'SSS '.$range,
                'group_id' => 2
            ));
        }

    }
}
