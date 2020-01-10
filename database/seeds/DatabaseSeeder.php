<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_logins')->insert([
            'email' => 'admin',
            'role' => 'admin',
            'password' => '12345',
        ]);
    }
}
