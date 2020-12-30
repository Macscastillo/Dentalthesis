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
       $branch1 = DB::table('branches')->insert([
           'name'  => 'Makati'

       ]);

       $branch2 = DB::table('branches')->insert([
           'name'  => 'Pateros'
       ]);
    }
}
