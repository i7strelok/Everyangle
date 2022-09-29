<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MediaType;
use Illuminate\Support\Facades\DB;

class MediaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media_types')->insert([
            'id' => 1,
	        'name' => 'Media Type 1',
        ]);
        DB::table('media_types')->insert([
            'id' => 2,
	        'name' => 'Media Type 2',
        ]);
        DB::table('media_types')->insert([
            'id' => 3,
	        'name' => 'Media Type 3',
        ]);
    }
}
