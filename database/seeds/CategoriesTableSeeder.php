<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category(['name' => 'Nature']);
        $category->save();
        $category = new Category(['name' => 'History']);
        $category->save();
        $category = new Category(['name' => 'Factory']);
        $category->save();
        $category = new Category(['name' => 'Art']);
        $category->save();
        $category = new Category(['name' => 'Technology']);
        $category->save();
        $category = new Category(['name' => 'Culture']);
        $category->save();
        $category = new Category(['name' => 'Exotics']);
        $category->save();
        $category = new Category(['name' => 'Food']);
        $category->save();
        $category = new Category(['name' => 'Transportation']);
        $category->save();
    }
}
