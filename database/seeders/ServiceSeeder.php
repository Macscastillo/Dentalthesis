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
        
           $services1 = DB::table ('services')
           ->insert([
               'name'   => 'Oral Prophylaxis',
               'price'  => '1000'
            ]);
           
           $services2 = DB::table ('services')
           ->insert([
               'name' => 'Flouride Treatement',
               'price'  => '1000'
           ]);
             
           $services3 = DB::table ('services')
           ->insert([
               'name' => 'Pit and Fissure Sealant',
               'price'  => '1000'
               ]);
           
           $services4 = DB::table ('services')
           ->insert([
               'name' => 'Composite Restoration',
               'price'  => '1000'
               ]);
             
           $services5 = DB::table ('services')
           ->insert([
               'name' => 'Tooth Extraction',
               'price'  => '1000'
               ]);
           
           $services6 = DB::table ('services')
           ->insert([
               'name' => 'Root Canal',
               'price'  => '1000'
               ]);
      
    }
}
