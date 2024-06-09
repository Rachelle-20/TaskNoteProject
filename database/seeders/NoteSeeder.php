<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NoteSeeder extends Seeder
{
    public function run()
    {
        $notes = [
            ['task_id' => 1, 'user_id' => 1, 'content' => 'Discuss with the team about the proposal.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['task_id' => 2, 'user_id' => 2, 'content' => 'Check the error logs for more details.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['task_id' => 3, 'user_id' => 3, 'content' => 'Include screenshots in the documentation.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['task_id' => 4, 'user_id' => 4, 'content' => 'Get feedback from the marketing team on the new design.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['task_id' => 5, 'user_id' => 5, 'content' => 'Prepare a list of questions for the interviews.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            // Add more realistic notes as needed
        ];

        DB::table('notes')->insert($notes);
    }
}
