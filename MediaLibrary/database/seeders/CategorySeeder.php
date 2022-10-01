<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creating default categories
        Category::create([
            'name'=> 'Pop',
            'media_type' => 'Music',
        ]);

        Category::create([
            'name'=> 'Rock',
            'media_type' => 'Music',
        ]);

        Category::create([
            'name'=> 'Metal',
            'media_type' => 'Music',
        ]);

        Category::create([
            'name'=> 'Western',
            'media_type' => 'Movies',
        ]);

        Category::create([
            'name'=> 'Action',
            'media_type' => 'Movies',
        ]);

        Category::create([
            'name'=> 'Comedy',
            'media_type' => 'Movies',
        ]);

        Category::create([
            'name'=> 'Sport',
            'media_type' => 'Games',
        ]);

        Category::create([
            'name'=> 'Puzzlers',
            'media_type' => 'Games',
        ]);

        Category::create([
            'name'=> 'Shooters',
            'media_type' => 'Games',
        ]);
    }
}
