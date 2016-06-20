<?php

use Illuminate\Database\seeder;
use Riari\Forum\Models\Category;

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        //Category::truncate();

        $faker = \Faker\Factory::create();

        foreach(range(1, 4) as $group) {

            $parent_category = null;

            if ($group === 2) {
                $parent_category = 2;
            }
            Category::create(array(
                'parent_category' => $parent_category,
                'title' => $faker->word,
                'subtitle' => $faker->word,
                'weight' => rand(0, 1)
            ));
        }
    }
}
