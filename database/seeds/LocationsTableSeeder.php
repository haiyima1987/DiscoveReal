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
            'address' => 'Dam Square',
            'city' => 'Amsterdam',
            'country' => 'The Netherlands'
        ]);
        $location->save();
        $location = new Location([
            'address' => 'Weteringschans 6-8, 1017 SG',
            'city' => 'Amsterdam',
            'country' => 'The Netherlands'
        ]);
        $location->save();
        $location = new Location([
            'address' => 'Lievevrouwbroersstraat 31',
            'city' => 'Brussels',
            'country' => 'Belgium'
        ]);
        $location->save();
        $location = new Location([
            'address' => 'Pariser Platz',
            'city' => 'Berlin',
            'country' => 'Germany'
        ]);
        $location->save();
        $location = new Location([
            'address' => 'Carrer de Mallorca, 401',
            'city' => 'Barcelona',
            'country' => 'Spain'
        ]);
        $location->save();
    }
}
