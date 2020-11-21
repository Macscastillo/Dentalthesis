<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('branches')->insert([
           ['name'  => 'Makati'],
           ['name'  => 'Manila']
       ]);
    }
}
