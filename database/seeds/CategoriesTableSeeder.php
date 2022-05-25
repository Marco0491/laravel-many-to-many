<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newCategory = new Category();
            $newCategory->name = $faker->unique()->word();
            $newCategory->save();
        }
    }
}
