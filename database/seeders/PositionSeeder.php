<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            ['name' => 'Owner'],
            ['name' => 'Doctor'],
            ['name' => 'Admin']
        ]);

         $position1 = DB::table ('positions')->insert (['name' => 'Owner'
         ]);
           $position2 = DB::table ('positions')->insert (['name' => 'Admin'
         ]);
             $position3 = DB::table ('positions')->insert (['name' => 'Doctor'
         ]);
    }
}
