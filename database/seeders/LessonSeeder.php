<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;
class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Lesson::insert([
            ['lesson' => 'vocal', 'lesson_ko' => '보컬', 'created_at' => now(), 'updated_at' => now()],
            ['lesson' => 'dance', 'lesson_ko' => '댄스', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
