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
            ['lesson' => 'dance', 'lesson_ko' => '댄스', 'created_at' => now(), 'updated_at' => now()],
            ['lesson' => 'vocal', 'lesson_ko' => '보컬', 'created_at' => now(), 'updated_at' => now()],
            ['lesson' => 'vocaldance', 'lesson_ko' => '보컬&댄스', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
