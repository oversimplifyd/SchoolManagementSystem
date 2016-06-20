<?php

use Illuminate\Database\seeder;
use Elihans\ClassType;

class ClassTypeTableSeeder extends Seeder {

    public function run()
    {
        ClassType::truncate();

        $groups = ['APEX', 'BLISS', 'GOLD', 'SILVER', 'BRONZE', 'DIAMOND'];

        foreach($groups as $key => $group) {
            ClassType::create(array(
                'name' => $group,
            ));
        }
    }
}
