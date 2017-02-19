<?php

use App\Attraction;
use Illuminate\Database\Seeder;

class AttractionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attraction = new Attraction(['name' => 'Dam Square', 'location_id' => 0]);
        $attraction->save();
        $attraction = new Attraction(['name' => 'Paradiso', 'location_id' => 1]);
        $attraction->save();
        $attraction = new Attraction(['name' => 'Manneken Pis', 'location_id' => 2]);
        $attraction->save();
        $attraction = new Attraction(['name' => 'Brandenburg Gate', 'location_id' => 3]);
        $attraction->save();
        $attraction = new Attraction(['name' => 'La Sagrada Familia', 'location_id' => 4]);
        $attraction->save();
    }
}
