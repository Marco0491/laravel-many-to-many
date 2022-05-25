<?php

use App\Category;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CategoryPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories_id = Category::pluck('id')->toArray();
        $posts = Post::all();

        foreach($posts as $post) {
            $post->categories()->sync($faker->randomElements($categories_id, rand(1,4)));
        }
    }
}
