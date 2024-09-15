<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();

        Post::factory(50)->make()->each(function ($post) use ($users, $categories) {
            $post->user_id = $users->random()->getId();
            $post->save();

            $post->categories()->attach(
                $categories->random(rand(1, 4))->pluck('id')->toArray()
            );
        });
    }
}
