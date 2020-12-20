<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $categories = Category::all();

        foreach($categories as $category)
        {
            foreach(range(1,2) as $index)
            {
                $category->categoryQuestions()->create([
                    'question_text' => $faker->sentence(4)
                ]);
            }
        }
    }
}
