<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Part;
class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Part::insert([
            ['group_id' => 1, 'part' => 'regular', 'part_ko' => '입시정규반', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 1, 'part' => 'preparatory', 'part_ko' => '입시예비반', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 2, 'part' => 'regular', 'part_ko' => '입시정규반', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 2, 'part' => 'preparatory', 'part_ko' => '입시예비반', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 3, 'part' => 'audition-a', 'part_ko' => '오디션 정규반A', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 3, 'part' => 'audition-b', 'part_ko' => '오디션 정규반B', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 3, 'part' => 'audition-c', 'part_ko' => '오디션 정규반C', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 4, 'part' => 'two-times-per-week', 'part_ko' => '단체레슨 주2회', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 4, 'part' => 'one-time-per-week', 'part_ko' => '단체레슨 주1회', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 5, 'part' => 'two-times-per-week', 'part_ko' => '주1회', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 5, 'part' => 'one-time-per-week', 'part_ko' => '주2회', 'created_at' => now(), 'updated_at' => now()],

            ['group_id' => 6, 'part' => 'regular', 'part_ko' => '입시정규반', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 6, 'part' => 'preparatory', 'part_ko' => '입시예비반', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 7, 'part' => 'regular', 'part_ko' => '입시정규반', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 7, 'part' => 'preparatory', 'part_ko' => '입시예비반', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 8, 'part' => 'audition-a', 'part_ko' => '오디션 정규반A', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 8, 'part' => 'audition-b', 'part_ko' => '오디션 정규반B', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 8, 'part' => 'audition-c', 'part_ko' => '오디션 정규반C', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 9, 'part' => 'two-times-per-week', 'part_ko' => '단체레슨 주2회', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 9, 'part' => 'one-time-per-week', 'part_ko' => '단체레슨 주1회', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 10, 'part' => 'two-times-per-week', 'part_ko' => '주1회', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 10, 'part' => 'one-time-per-week', 'part_ko' => '주2회', 'created_at' => now(), 'updated_at' => now()],

            ['group_id' => 11, 'part' => 'regular', 'part_ko' => '입시정규반', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 11, 'part' => 'preparatory', 'part_ko' => '입시예비반', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 12, 'part' => 'regular', 'part_ko' => '입시정규반', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 12, 'part' => 'preparatory', 'part_ko' => '입시예비반', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 13, 'part' => 'audition-a', 'part_ko' => '오디션 정규반A', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 13, 'part' => 'audition-b', 'part_ko' => '오디션 정규반B', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 13, 'part' => 'audition-c', 'part_ko' => '오디션 정규반C', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 14, 'part' => 'two-times-per-week', 'part_ko' => '단체레슨 주2회', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 14, 'part' => 'one-time-per-week', 'part_ko' => '단체레슨 주1회', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 15, 'part' => 'two-times-per-week', 'part_ko' => '주1회', 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 15, 'part' => 'one-time-per-week', 'part_ko' => '주2회', 'created_at' => now(), 'updated_at' => now()],            
        ]);
    }
}
