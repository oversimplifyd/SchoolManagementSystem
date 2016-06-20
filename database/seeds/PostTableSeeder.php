<?php

use Illuminate\Database\seeder;
use Riari\Forum\Models\Post;

class PostTableSeeder extends Seeder {

    public function run()
    {
        Post::truncate();

        $faker = \Faker\Factory::create();

        foreach(range(2, 7) as $group) {

            Post::create(array(
                'parent_thread' => $group,
                'author_id' => $group - 1 ,
                'content' => $faker->text()
            ));
        }
    }
}
