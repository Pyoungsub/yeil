<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Group::insert([
            //보컬
            ['purpose_id' => 1, 'group' => 'college-entrance', 'group_ko' => '예대입시반', 'created_at' => now(), 'updated_at' => now()],
            ['purpose_id' => 1, 'group' => 'high-school-entrance', 'group_ko' => '예고입시반', 'created_at' => now(), 'updated_at' => now()],
            ['purpose_id' => 2, 'group' => 'audition', 'group_ko' => '오디션 정규반', 'created_at' => now(), 'updated_at' => now()],
            ['purpose_id' => 2, 'group' => 'audition-basic', 'group_ko' => '오디션 기초반', 'created_at' => now(), 'updated_at' => now()],
            ['purpose_id' => 3, 'group' => 'group', 'group_ko' => '단체레슨', 'created_at' => now(), 'updated_at' => now()],
            //댄스
            ['purpose_id' => 4, 'group' => 'college-entrance', 'group_ko' => '예대입시반', 'created_at' => now(), 'updated_at' => now()],
            ['purpose_id' => 4, 'group' => 'high-school-entrance', 'group_ko' => '예고입시반', 'created_at' => now(), 'updated_at' => now()],
            ['purpose_id' => 5, 'group' => 'audition', 'group_ko' => '오디션 정규반', 'created_at' => now(), 'updated_at' => now()],
            ['purpose_id' => 5, 'group' => 'audition-basic', 'group_ko' => '오디션 기초반', 'created_at' => now(), 'updated_at' => now()],
            ['purpose_id' => 6, 'group' => 'group', 'group_ko' => '단체레슨', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
