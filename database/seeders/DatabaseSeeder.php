<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $this->call([ServiceSeeder::class,
        			BranchSeeder::class,
        			DoctorSeeder::class,
                    PositionSeeder::class,
                    TeethSeeder::class,
                    OwnerSeeder::class
        		]);
       
    }
}
