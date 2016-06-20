<?php

use Illuminate\Database\seeder;
use Elihans\ClassGroup;

class ClassGroupTableSeeder extends Seeder {

    public function run()
    {
        ClassGroup::truncate();

        $groups = ['LOWER', 'JUNIOR', 'SENIOR'];

        foreach($groups as $key => $group) {
            ClassGroup::create(array(
                'name' => $group,
            ));
        }
    }
}
