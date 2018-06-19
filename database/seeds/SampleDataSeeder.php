<?php

use App\Category;
use App\Product;
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

        $faker = Faker::create("vi_VN");

        for ($i = 0; $i < 5; $i++) {
            $category = Category::create(["name" => $faker->company, "description" => $faker->title]);
            for ($j = 0; $j < 5; $j++) {
                $sub = Category::create([
                    "name" => $faker->company,
                    "description" => $faker->paragraph(1),
                    "parent_id" => $category->id
                ]);
                for ($k=0; $k<5; $k++) {
                    $product = Product::create(["name" => $faker->name]);
                    $product->addMediaFromUrl("http://demo.alogs.net/img/product1_2.jpg")
                        ->setFileName(md5(time()).".jpg")->toMediaCollection("images");
                    $sub->products()->attach($product);
                }
            }
        }

    }
}
