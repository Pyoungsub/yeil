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
            ['group_id' => 1, 'part' => 'regular-a', 'part_ko' => '입시 정규반 A', 'description' => '보컬개인 주 2회', 'price' => 650000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 1, 'part' => 'regular-b', 'part_ko' => '입시 정규반 B', 'description' => '보컬개인 주 1회 + 이론개인 주 1회', 'price' => 600000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 2, 'part' => 'regular-a', 'part_ko' => '입시 정규반 A', 'description' => '보컬개인 주 2회', 'price' => 650000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 2, 'part' => 'regular-b', 'part_ko' => '입시 정규반 B', 'description' => '보컬개인 주 1회 + 이론개인 주 1회', 'price' => 600000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 3, 'part' => 'audition-a', 'part_ko' => '오디션 정규반 A', 'description' => '보컬개인 주 1회 + 프리패스', 'price' => 950000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 3, 'part' => 'audition-b', 'part_ko' => '오디션 정규반 B', 'description' => '보컬개인 주 1회 + 댄스 주 2회 + 댄스개인 주 1회', 'price' => 900000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 3, 'part' => 'audition-c', 'part_ko' => '오디션 정규반 C', 'description' => '보컬개인 주 1회 + 댄스 주 2회', 'price' => 550000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 4, 'part' => 'audition-basic-a', 'part_ko' => '오디션 기초반 A', 'description' => '보컬개인 주 1회 + 댄스개인 주 1회', 'price' => 650000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 4, 'part' => 'audition-basic-b', 'part_ko' => '오디션 기초반 B', 'description' => '보컬개인 주 1회 + 댄스단체 주 1회', 'price' => 450000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 5, 'part' => 'personal', 'part_ko' => '보컬개인', 'description' => '보컬개인 주 1회', 'price' => 270000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 6, 'part' => 'regular', 'part_ko' => '입시정규반', 'description' => '프리패스 + 입시특별반', 'price' => 650000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 6, 'part' => 'preparatory', 'part_ko' => '입시예비반', 'description' => '프리패스 + 입시특별반', 'price' => 650000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 7, 'part' => 'regular', 'part_ko' => '입시정규반', 'description' => '프리패스 + 입시특별반', 'price' => 650000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 7, 'part' => 'preparatory', 'part_ko' => '입시예비반', 'description' => '프리패스 + 입시특별반', 'price' => 650000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 8, 'part' => 'audition-a', 'part_ko' => '오디션 정규반 A', 'description' => '보컬개인 주 1회 + 프리패스', 'price' => 950000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 8, 'part' => 'audition-b', 'part_ko' => '오디션 정규반 B', 'description' => '보컬개인 주 1회 + 댄스 주 2회 + 댄스개인 주 1회', 'price' => 900000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 8, 'part' => 'audition-c', 'part_ko' => '오디션 정규반 C', 'description' => '보컬개인 주 1회 + 댄스 주 2회', 'price' => 550000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 9, 'part' => 'audition-basic-a', 'part_ko' => '오디션 기초반 A', 'description' => '단체레슨 주 2회', 'price' => 300000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 10, 'part' => 'audition-basic-b', 'part_ko' => '오디션 기초반 B', 'description' => '단체레슨 주 3회', 'price' => 400000, 'created_at' => now(), 'updated_at' => now()],
            ['group_id' => 11, 'part' => 'pastime', 'part_ko' => '취미반', 'description' => '단체레슨 주 1회', 'price' => 400000, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
