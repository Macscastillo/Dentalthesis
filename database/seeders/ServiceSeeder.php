<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //DB::table('services')->insert([
        
           $services1 = DB::table ('services')->insert (['name' => 'Oral Prophylaxis'
         ]);
           $services2 = DB::table ('services')->insert (['name' => 'Flouride Treatement'
         ]);
             $services3 = DB::table ('services')->insert (['name' => 'Pit and Fissure Sealant'
         ]);
           $services4 = DB::table ('services')->insert (['name' => 'Composite Restoration'
         ]);
             $services5 = DB::table ('services')->insert (['name' => 'Tooth Extraction'
         ]);
           $services6 = DB::table ('services')->insert (['name' => 'Root Canal'
         ]);
      
    }
}
