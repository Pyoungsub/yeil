<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Schedule::insert([
            ['img_path' => 'schedules/mNvXDdVAhpyDQWQSRBm3Ekt6xKBopMye5NqqKiut.png']
        ]);
    }
}
