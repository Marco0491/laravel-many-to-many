<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::pluck('id')->toArray();

        for ($i=0; $i < 200; $i++) {
            $newPost = new Post();
            $newPost->user_id = $faker->randomElement($user_ids);
            $newPost->title = ucfirst($faker->realTextBetween(6, 16));
            $newPost->content = $faker->realText(400);
            $newPost->image_url = "https://picsum.photos/id/$i/450/600";
            $newPost->save();
        }
    }
}
