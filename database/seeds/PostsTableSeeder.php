<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post(['user_id' => 2, 'title' => 'Lovely city',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 1, 'category_id' => 1, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 3, 'title' => 'Nice city',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 3, 'category_id' => 2, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Awesome city',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 4, 'category_id' => 3, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 4, 'title' => 'Beautiful place',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 5, 'category_id' => 4, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Great feeling',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 2, 'category_id' => 5, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 3, 'title' => 'I love it',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 3, 'category_id' => 6, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'I like it a lot',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 4, 'category_id' => 7, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 4, 'title' => 'Nice experience',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 5, 'category_id' => 8, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Anything to complain',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 2, 'category_id' => 9, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 3, 'title' => 'Good times',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 3, 'category_id' => 1, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'You have to come here once',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 4, 'category_id' => 2, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 4, 'title' => 'Beautiful landscape',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 5, 'category_id' => 3, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Met some nice people',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 2, 'category_id' => 4, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 3, 'title' => 'Heard of the rumor',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 3, 'category_id' => 5, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Nothing to complain',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 4, 'category_id' => 6, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 4, 'title' => 'Good to go',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 5, 'category_id' => 7, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Fell in love',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 2, 'category_id' => 8, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 3, 'title' => 'Great place to start',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 3, 'category_id' => 9, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Have it all',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 4, 'category_id' => 1, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 4, 'title' => 'Good and cheap',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 5, 'category_id' => 2, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Nice food',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 1, 'category_id' => 3, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 3, 'title' => 'Amazing culture',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 3, 'category_id' => 4, 'published' => 1]);
        $post->save();

        $post = new Post(['user_id' => 2, 'title' => 'Lovely city',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 1, 'category_id' => 1, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Great place for your holiday',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 2, 'category_id' => 8, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Lovely city',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 1, 'category_id' => 1, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Great place for your holiday',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 2, 'category_id' => 8, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Lovely city',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 1, 'category_id' => 1, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Great place for your holiday',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 2, 'category_id' => 8, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Lovely city',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 1, 'category_id' => 1, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Great place for your holiday',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 2, 'category_id' => 8, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Lovely city',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 1, 'category_id' => 1, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Great place for your holiday',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 2, 'category_id' => 8, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Lovely city',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 1, 'category_id' => 1, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Great place for your holiday',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 2, 'category_id' => 8, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Lovely city',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 1, 'category_id' => 1, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Great place for your holiday',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 2, 'category_id' => 8, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Lovely city',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 1, 'category_id' => 1, 'published' => 1]);
        $post->save();
        $post = new Post(['user_id' => 2, 'title' => 'Great place for your holiday',
            'content' => 'I like the lovely city, I enjoyed a lot here, will come back again for sure.', 'rate' => null,
            'location_id' => 2, 'category_id' => 8, 'published' => 1]);
        $post->save();
    }
}
