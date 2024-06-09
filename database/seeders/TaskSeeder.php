<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $tasks = [
            ['user_id' => 1, 'title' => 'Complete the project proposal', 'description' => 'Draft and finalize the project proposal for the new client.', 'due_date' => '2024-06-30', 'status' => 'pending', 'priority_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 2, 'title' => 'Fix login bug', 'description' => 'Investigate and fix the login issue reported by users.', 'due_date' => '2024-07-01', 'status' => 'in_progress', 'priority_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 3, 'title' => 'Update user documentation', 'description' => 'Update the user documentation with the latest features.', 'due_date' => '2024-07-02', 'status' => 'completed', 'priority_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 4, 'title' => 'Design new landing page', 'description' => 'Create a new design for the landing page.', 'due_date' => '2024-07-03', 'status' => 'pending', 'priority_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['user_id' => 5, 'title' => 'Conduct user interviews', 'description' => 'Schedule and conduct interviews with users for feedback.', 'due_date' => '2024-07-04', 'status' => 'in_progress', 'priority_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            // Add more realistic tasks as needed
        ];


        DB::table('tasks')->insert($tasks);
    }
}
