<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
