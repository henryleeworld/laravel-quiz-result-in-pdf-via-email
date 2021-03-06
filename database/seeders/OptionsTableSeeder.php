<?php

namespace Database\Seeders;

use App\Models\Question;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $questions = Question::all();

        foreach($questions as $question)
        {
            $correctOption = rand(1,4);

            foreach(range(1,4) as $index)
            {
                $question->questionOptions()->create([
                    'option_text' => $faker->unique()->word,
                    'points' => $index == $correctOption ? 1 : 0,
                ]);
            }
        }
    }
}
