<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = DB::table('users')
        ->insert([ 
            'fname' => 'owner',
            'lname' => 'owner',
            'midname' => 'owner',
            'email' => 'owner@owner.com',
            'password' => Hash::make('password'),
            'positions_id' => '1',
            'branches_id' => '1'
        ]);
    }
}
