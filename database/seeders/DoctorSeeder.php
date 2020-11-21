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
        DB::table('doctors')->insert([
            ['name' => 'Mathew'],
            ['name' => 'Isaac'],
            ['name'  => 'Gayda'],
            ['name'  => 'Castillo']
        ]);
    }
}
