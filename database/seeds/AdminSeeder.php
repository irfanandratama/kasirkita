<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'ihul',
            'email' => 'ihul@gmail.com',
            'password' => bcrypt('ihul1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'last_login' => Carbon::now()
        ]);
    }
}
