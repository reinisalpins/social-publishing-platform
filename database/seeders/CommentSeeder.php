<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $posts = Post::all();

        Comment::factory(200)->make()->each(function ($comment) use ($users, $posts) {
            $comment->user_id = $users->random()->getId();
            $comment->post_id = $posts->random()->getId();
            $comment->save();
        });
    }
}
