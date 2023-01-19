<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //insert a user
        DB::table('users')->insert([
            'name' => 'Mr Admin',
            'email' => 'admin@demo.com',
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PostTableSeeder::class);
    }
}
