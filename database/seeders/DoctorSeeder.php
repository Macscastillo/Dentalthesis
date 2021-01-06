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
      $doctor1 = DB::table ('doctors')
      ->insert(['name' => 'Doc. Razel Len Roldan']);

      $doctor2 = DB::table ('doctors')
      ->insert(['name' => 'Doc. Trixia Mae Cervantes']);

      $doctor3 = DB::table ('doctors')
      ->insert(['name' => 'Doc. Michelle James Krial']);
    }
}
