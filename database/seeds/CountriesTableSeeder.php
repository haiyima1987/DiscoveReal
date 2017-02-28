<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new Country(['name' => 'Belgium', 'path' => 'belgium.png']);
        $country->save();
        $country = new Country(['name' => 'Bulgaria', 'path' => 'bulgaria.png']);
        $country->save();
        $country = new Country(['name' => 'France', 'path' => 'france.png']);
        $country->save();
        $country = new Country(['name' => 'Germany', 'path' => 'germany.png']);
        $country->save();
        $country = new Country(['name' => 'Greece', 'path' => 'greece.png']);
        $country->save();
        $country = new Country(['name' => 'Italy', 'path' => 'italy.png']);
        $country->save();
        $country = new Country(['name' => 'The Netherlands', 'path' => 'netherlands.png']);
        $country->save();
        $country = new Country(['name' => 'Norway', 'path' => 'norway.png']);
        $country->save();
        $country = new Country(['name' => 'Poland', 'path' => 'poland.png']);
        $country->save();
        $country = new Country(['name' => 'Spain', 'path' => 'spain.png']);
        $country->save();
        $country = new Country(['name' => 'Sweden', 'path' => 'sweden.png']);
        $country->save();
        $country = new Country(['name' => 'Switzerland', 'path' => 'switzerland.png']);
        $country->save();
        $country = new Country(['name' => 'Turkey', 'path' => 'turkey.png']);
        $country->save();
        $country = new Country(['name' => 'UK', 'path' => 'uk.png']);
        $country->save();
    }
}
