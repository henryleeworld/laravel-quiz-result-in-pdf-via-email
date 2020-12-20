<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach(range(1,5) as $id)
        {
            Category::insert([
                'id' => $id,
                'name' => $faker->sentence(3)
            ]);
        }
    }
}
