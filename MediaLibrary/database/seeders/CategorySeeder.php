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
        /*Category::create([
            'name'=> 'Music',
        ]);*/
        DB::table('categories')->insert([
            'id' => 1,
	        'name' => 'Category 1',
            'media_type' => \App\MediaTypes\MediaTypeEnum::MUSIC,
        ]);
    }
}
