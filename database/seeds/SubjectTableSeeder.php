<?php

use Illuminate\Database\seeder;
use Elihans\Subject;

class SubjectTableSeeder extends Seeder {

    public function run()
    {
        Subject::truncate();

        $groups = ['MATHEMATICS', 'ENGLISH', 'BASIC SCIENCE', 'ELEMENTARY SCIENCE', 'RHYMES'];

        foreach($groups as $key => $group) {
            Subject::create(array(
                'name' => $group,
                'group_id' => rand(1, 3)
            ));
        }
    }
}
