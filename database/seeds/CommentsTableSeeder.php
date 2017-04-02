<?php

use App\Comment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment([
            'post_id' => 1,
            'user_id' => 1,
            'datetime' => Carbon::now(),
            'title' => 'I like it a lot as well',
            'content' => 'I have been to the place many times, really good experience, met many friends.'
        ]);
        $comment->save();
        $comment = new Comment([
            'post_id' => 1,
            'user_id' => 2,
            'datetime' => Carbon::now(),
            'title' => 'I like it a lot as well',
            'content' => 'I have been to the place many times, really good experience, met many friends.'
        ]);
        $comment->save();
        $comment = new Comment([
            'post_id' => 1,
            'user_id' => 3,
            'datetime' => Carbon::now(),
            'title' => 'I like it a lot as well',
            'content' => 'I have been to the place many times, really good experience, met many friends.'
        ]);
        $comment->save();
        $comment = new Comment([
            'post_id' => 1,
            'user_id' => 4,
            'datetime' => Carbon::now(),
            'title' => 'I like it a lot as well',
            'content' => 'I have been to the place many times, really good experience, met many friends.'
        ]);
        $comment->save();
    }
}
