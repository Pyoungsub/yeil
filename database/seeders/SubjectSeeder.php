<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;
class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Subject::insert([
            ['lesson_id' => 1, 'subject' => '개인레슨'],
            ['lesson_id' => 1, 'subject' => '단체레슨'],
            ['lesson_id' => 2, 'subject' => 'KPOP'],
            ['lesson_id' => 2, 'subject' => '걸리쉬A'],
            ['lesson_id' => 2, 'subject' => '걸리쉬B'],
            ['lesson_id' => 2, 'subject' => '걸스베이직'],
            ['lesson_id' => 2, 'subject' => '걸스힙합A'],
            ['lesson_id' => 2, 'subject' => '걸스힙합B'],
            ['lesson_id' => 2, 'subject' => '걸스힙합C'],
            ['lesson_id' => 2, 'subject' => '얼반'],
            ['lesson_id' => 2, 'subject' => '엔터'],
            ['lesson_id' => 2, 'subject' => '왁킹'],
            ['lesson_id' => 2, 'subject' => '예비반'],
            ['lesson_id' => 2, 'subject' => '재즈(초급)'],
            ['lesson_id' => 2, 'subject' => '재즈(중급)'],
            ['lesson_id' => 2, 'subject' => '지현T'],
            ['lesson_id' => 2, 'subject' => '수정T'],
            ['lesson_id' => 2, 'subject' => '프리스타일'],
            ['lesson_id' => 2, 'subject' => '하드트레이닝'],
            ['lesson_id' => 2, 'subject' => '힙합'],
        ]);
    }
}
