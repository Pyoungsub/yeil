<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facility;
class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Facility::insert([
            ['img_path' => 'facilities/4x7zfcMVUXeXlLvlsLMSRhmgudISJXwN9afGvj4T.jpeg', 'description' => '예일아카데미 전경'],
            ['img_path' => 'facilities/PgXJkL9PfEWZ0I0YqiKQIFyPzNdjkSv5F97F3LQH.jpeg', 'description' => '개인 댄스 연습실'],
            ['img_path' => 'facilities/qo5cJ77ZgXuoRcTNZJxCx7tBqkf49iInuChgbbI0.jpeg', 'description' => '개인 보컬 연습실'],
            ['img_path' => 'facilities/vTBOjRh5kkaPXX2jl8d7GZ0OHIaUxYmR3D6PcBDM.jpeg', 'description' => '촬영 스튜디오'],
            ['img_path' => 'facilities/mNvXDdVAhpyDQWQSRBm3Ekt6xKBopMye5NqqKiut.jpeg', 'description' => 'A홀사진'],
        ]);
    }
}
