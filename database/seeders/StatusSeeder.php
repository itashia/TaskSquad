<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('task_statuses')->insert([
            ['is_read' => 'خوانده شده', 'not_read' => 'خوانده نشده', 'finish' => 'پایان یافته', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('project_statuses')->insert([
            ['done' => 'انجام شده', 'not_done' => 'انجام نشده', 'finish' => 'پایان یافته', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
