<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PrioritySeeder extends Seeder
{
    public function run()
    {
        $priorities = [
            ['name' => 'Low', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Medium', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'High', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Urgent', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('priorities')->insert($priorities);
    }
}
