<?php

use Illuminate\Database\seeder;
use Riari\Forum\Models\Thread;

class ThreadTableSeeder extends Seeder {

    public function run()
    {
        Thread::truncate();

        $faker = \Faker\Factory::create();

        foreach(range(1, 7) as $group) {

            Thread::create(array(
                'parent_category' => rand(1, 5),
                'author_id' => $group - 1 ,
                'title' => $faker->word ,
                'pinned' => rand(0, 1),
                'locked' => 0 ,
            ));
        }
    }
}
