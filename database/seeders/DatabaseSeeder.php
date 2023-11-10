<?php

namespace Database\Seeders;

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

        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'info@liforny.com',
            'password' => '$2y$10$a4NI6p2xjH3H9wDt.PJH0u1sqVY5paY/H4JZjDhjIZ0vpB8Ar0x/q',
        ]);
    }
}
