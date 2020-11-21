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
       DB::table('services')->insert([
           ['name'  => 'Orthodontics'],
           ['name'  => 'Endodontics'],
           ['name'  => 'Prosthodontics'],
           ['name'  => 'Oral Prophylaxis'],
           ['name'  => 'Dental X-ray Service and Diagnostics'],
           ['name'  => 'Teeth Whitening'],
           ['name'  => 'Dental Implantology'],
           ['name'  => 'Oral Surgery'],
           ['name'  => 'Restorative Dentistry'],
           ['name'  => 'Dental Crown bridges and Veneers']
       ]); 
    }
}
