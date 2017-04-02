<?php

use App\Photo;
use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photo = new Photo(['post_id' => 1, 'imgPath' => '11491163902.jpg', 'thumbnailPath' => '1thumbnail1491163902.jpg']);
        $photo->save();
        $photo = new Photo(['post_id' => 1, 'imgPath' => '11491163905.jpg', 'thumbnailPath' => '1thumbnail1491163905.jpg']);
        $photo->save();
        $photo = new Photo(['post_id' => 1, 'imgPath' => '11491163910.jpg', 'thumbnailPath' => '1thumbnail1491163910.jpg']);
        $photo->save();
        $photo = new Photo(['post_id' => 1, 'imgPath' => '11491163913.jpg', 'thumbnailPath' => '1thumbnail1491163914.jpg']);
        $photo->save();
    }
}
