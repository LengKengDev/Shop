<?php

use App\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            $category = Category::create(["name" => $faker->company, "description" => $faker->title]);
            for ($j = 0; $j < 5; $j++) {
                Category::create([
                    "name" => $faker->company,
                    "description" => $faker->paragraph(1),
                    "parent_id" => $category->id
                ]);
            }
        }

    }
}
