<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Purpose;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Purpose::insert([
            ['lesson_id' => 1, 'purpose' => 'exam', 'purpose_ko' => '입시클래스', 'created_at' => now(), 'updated_at' => now()],
            ['lesson_id' => 1, 'purpose' => 'audition', 'purpose_ko' => '오디션클래스', 'created_at' => now(), 'updated_at' => now()],
            ['lesson_id' => 1, 'purpose' => 'pastime', 'purpose_ko' => '취미클래스', 'created_at' => now(), 'updated_at' => now()],
            ['lesson_id' => 2, 'purpose' => 'exam', 'purpose_ko' => '입시클래스', 'created_at' => now(), 'updated_at' => now()],
            ['lesson_id' => 2, 'purpose' => 'audition', 'purpose_ko' => '오디션클래스', 'created_at' => now(), 'updated_at' => now()],
            ['lesson_id' => 2, 'purpose' => 'pastime', 'purpose_ko' => '취미클래스', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
