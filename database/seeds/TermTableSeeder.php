<?php

use Illuminate\Database\seeder;
use Elihans\Term;

class TermTableSeeder extends Seeder {

    public function run()
    {
        Term::truncate();

        $groups = ['FIRST', 'SECOND', 'THIRD'];

        foreach($groups as $key => $group) {
            Term::create(array(
                'name' => $group,
            ));
        }
    }
}
