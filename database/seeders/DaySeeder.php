<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Day;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Day::insert([
            ['day' => 0, 'ko' => '일'],
            ['day' => 1, 'ko' => '월'],
            ['day' => 2, 'ko' => '화'],
            ['day' => 3, 'ko' => '수'],
            ['day' => 4, 'ko' => '목'],
            ['day' => 5, 'ko' => '금'],
            ['day' => 6, 'ko' => '토'],
        ]);
    }
}
