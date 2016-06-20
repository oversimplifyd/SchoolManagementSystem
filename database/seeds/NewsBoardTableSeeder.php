<?php

use Illuminate\Database\seeder;
use Elihans\NewsBoard;

class NewsBoardTableSeeder extends Seeder {

    public function run()
    {
        NewsBoard::truncate();

        $faker = \Faker\Factory::create();

        $date = new DateTime();

        foreach(range(1, 3) as $range) {
            $news = NewsBoard::create(array(
                'title' => $faker->name,
                'news' => $faker->realText(),
                'featured_image' => bcrypt($date->format('Y-m-d H:i:sP')),
            ));
        }
    }
}