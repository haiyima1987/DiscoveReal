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
            'name' => 'Dam Square',
            'address' => 'Dam Square',
            'city' => 'Amsterdam',
            'country_id' => 7
        ]);
        $location->save();
        $location = new Location([
            'name' => 'Paradiso',
            'address' => 'Weteringschans 6-8, 1017 SG',
            'city' => 'Amsterdam',
            'country_id' => 7
        ]);
        $location->save();
        $location = new Location([
            'name' => 'Manneken Pis',
            'address' => 'Lievevrouwbroersstraat 31',
            'city' => 'Brussels',
            'country_id' => 1
        ]);
        $location->save();
        $location = new Location([
            'name' => 'Brandenburg Gate',
            'address' => 'Pariser Platz',
            'city' => 'Berlin',
            'country_id' => 4
        ]);
        $location->save();
        $location = new Location([
            'name' => 'La Sagrada Familia',
            'address' => 'Carrer de Mallorca, 401',
            'city' => 'Barcelona',
            'country_id' => 10
        ]);
        $location->save();
    }
}
