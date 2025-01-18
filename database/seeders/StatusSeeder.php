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

        DB::table('project_statuses')->insert([
            ['title' => 'not_done', 'value' => 'انجام نشده', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'done', 'value' => 'انجام شده', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'end', 'value' => 'پایان', 'created_at' => now(), 'updated_at' => now()]
        ]);

        DB::table('task_statuses')->insert([
            ['title' => 'not_read', 'value' => 'خوانده نشده', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'is_read', 'value' => 'خوانده شده', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'end', 'value' => 'پایان', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
