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
            'username' => 'admin1',
            'title' => 'New Version Published',
            'content' => 'Congratulations to our new version website!!!'
        ]);
        $news->save();

        $news = new News([
            'username' => 'admin2',
            'title' => 'Join Us',
            'content' => 'We are looking forward to your coming'
        ]);
        $news->save();






    }








}
