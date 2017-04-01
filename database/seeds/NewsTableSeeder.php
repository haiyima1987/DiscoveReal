<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = new News([
            'user_id' => 1,
            'title' => 'New Website Published',
            'content' => 'Congratulations on our new website!! Now you can not only post your interesting pictures, but also contact other users in person',
            'published' => 1,
            'imgPath' => null
        ]);
        $news->save();

        $news = new News([
            'user_id' => 1,
            'title' => 'Join Us',
            'content' => 'We are always looking forward to you, join us to share your great experience with other travelers!',
            'published' => 1,
            'imgPath' => null
        ]);
        $news->save();

        $news = new News([
            'user_id' => 1,
            'title' => 'We Are Hiring',
            'content' => 'In order to expand our website and offer better services, we are willing to have two more experienced full-stack web developers.',
            'published' => 1,
            'imgPath' => null
        ]);
        $news->save();

        $news = new News([
            'user_id' => 1,
            'title' => 'Vouchers All Over Europe',
            'content' => 'We now offer vouchers which can be used all over Europe, if you travel with our vouchers, you can get a 5% discount in hotels!',
            'published' => 1,
            'imgPath' => null
        ]);
        $news->save();

        $news = new News([
            'user_id' => 1,
            'title' => 'New Administrator',
            'content' => "From next month we will have a new administrator, let's hope DiscoveReal will be better and better day by day.",
            'published' => 1,
            'imgPath' => null
        ]);
        $news->save();
    }
}
