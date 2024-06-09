<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'John Doe', 'email' => 'john.doe@example.com', 'password' => Hash::make('password123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Jane Smith', 'email' => 'jane.smith@example.com', 'password' => Hash::make('password123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Alice Johnson', 'email' => 'alice.johnson@example.com', 'password' => Hash::make('password123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bob Brown', 'email' => 'bob.brown@example.com', 'password' => Hash::make('password123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Charlie Davis', 'email' => 'charlie.davis@example.com', 'password' => Hash::make('password123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            // Add more realistic users as needed
        ];

        DB::table('users')->insert($users);
    }
}
