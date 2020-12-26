<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $services1 = DB::table ('services')->insert (['name' => 'Doc. Razel Len Roldan'
         ]);
           $services2 = DB::table ('services')->insert (['name' => 'Doc. Trixia Mae Cervantes'
         ]);
             $services3 = DB::table ('services')->insert (['name' => 'Doc. Michelle James Krial'
         ]);
    }
}
