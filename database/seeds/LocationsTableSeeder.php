<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = new Location([
            'name' => 'dam square',
            'address' => 'dam square',
            'city' => 'amsterdam',
            'country_id' => 7
        ]);
        $location->save();
        $location = new Location([
            'name' => 'paradiso',
            'address' => 'weteringschans 6-8, 1017 sg',
            'city' => 'amsterdam',
            'country_id' => 7
        ]);
        $location->save();
        $location = new Location([
            'name' => 'manneken pis',
            'address' => 'lievevrouwbroersstraat 31',
            'city' => 'brussels',
            'country_id' => 1
        ]);
        $location->save();
        $location = new Location([
            'name' => 'brandenburg gate',
            'address' => 'pariser platz',
            'city' => 'berlin',
            'country_id' => 4
        ]);
        $location->save();
        $location = new Location([
            'name' => 'la sagrada familia',
            'address' => 'carrer de mallorca, 401',
            'city' => 'barcelona',
            'country_id' => 10
        ]);
        $location->save();
    }
}
