<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creating default users
        DB::table('users')->insert([
            'name'  => 'Carlos Fernández',
            'email'     => 'fernandez.carlos@outlook.es',
            'password'  => bcrypt('1212po12'),
        ]);

        DB::table('users')->insert([
            'name'  => 'Carlos Fernández',
            'email'     => 'piotr@everyangle.ai',
            'password'  => bcrypt('@PiotrCTO@EveryAngle'),
        ]);

        DB::table('users')->insert([
            'name'  => 'Fergal Keane',
            'email'     => 'fergal@everyangle.ai',
            'password'  => bcrypt('@FergalHR@EveryAngle'),
        ]);

        DB::table('users')->insert([
            'name'  => 'David Owens',
            'email'     => 'david@everyangle.ai',
            'password'  => bcrypt('@DavidCEO@EveryAngle'),
        ]);
    }
}
