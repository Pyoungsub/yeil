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
            ['purpose_id' => 5, 'subject_id' => 14 , 'day_id' => 2 , 'from' => '17:00', 'to' => '18:30', 'created_at' => '2024-09-08 13:45:00', 'updated_at'=> '2024-09-08 13:45:00'],
            ['purpose_id' => 5, 'subject_id' => 15 , 'day_id' => 2 , 'from' => '18:30', 'to' => '20:00', 'created_at' => '2024-09-08 13:45:17', 'updated_at'=> '2024-09-08 13:45:17'],
            ['purpose_id' => 5, 'subject_id' => 5 , 'day_id' => 2 , 'from' => '20:00', 'to' => '21:30', 'created_at' => '2024-09-08 13:46:15', 'updated_at'=> '2024-09-08 13:46:15'],
            ['purpose_id' => 5, 'subject_id' => 19 , 'day_id' => 3 , 'from' => '17:00', 'to' => '18:30', 'created_at' => '2024-09-08 13:46:33', 'updated_at'=> '2024-09-08 13:46:33'],
            ['purpose_id' => 5, 'subject_id' => 6 , 'day_id' => 3 , 'from' => '18:30', 'to' => '20:00', 'created_at' => '2024-09-08 13:46:49', 'updated_at'=> '2024-09-08 13:46:49'],
            ['purpose_id' => 5, 'subject_id' => 8 , 'day_id' => 3 , 'from' => '20:00', 'to' => '21:30', 'created_at' => '2024-09-08 13:47:22', 'updated_at'=> '2024-09-08 13:47:22'],
            ['purpose_id' => 5, 'subject_id' => 3 , 'day_id' => 4 , 'from' => '17:00', 'to' => '18:30', 'created_at' => '2024-09-08 13:47:49', 'updated_at'=> '2024-09-08 13:50:39'],
            ['purpose_id' => 5, 'subject_id' => 7 , 'day_id' => 4 , 'from' => '20:00', 'to' => '21:30', 'created_at' => '2024-09-08 13:51:16', 'updated_at'=> '2024-09-08 13:51:16'],
            ['purpose_id' => 5, 'subject_id' => 11 , 'day_id' => 5 , 'from' => '17:00', 'to' => '18:30', 'created_at' => '2024-09-08 13:51:30', 'updated_at'=> '2024-09-08 13:51:30'],
            ['purpose_id' => 5, 'subject_id' => 9 , 'day_id' => 5 , 'from' => '18:30', 'to' => '20:00', 'created_at' => '2024-09-08 13:51:49', 'updated_at'=> '2024-09-08 13:51:49'],
            ['purpose_id' => 5, 'subject_id' => 3 , 'day_id' => 7 , 'from' => '13:00', 'to' => '14:30', 'created_at' => '2024-09-08 13:52:08', 'updated_at'=> '2024-09-08 13:52:15'],
            ['purpose_id' => 5, 'subject_id' => 3 , 'day_id' => 7 , 'from' => '14:30', 'to' => '16:00', 'created_at' => '2024-09-08 13:52:34', 'updated_at'=> '2024-09-08 13:52:34'],
            ['purpose_id' => 5, 'subject_id' => 4 , 'day_id' => 7 , 'from' => '16:00', 'to' => '17:30', 'created_at' => '2024-09-08 13:52:54', 'updated_at'=> '2024-09-08 13:52:54'],
            ['purpose_id' => 5, 'subject_id' => 3 , 'day_id' => 7 , 'from' => '17:30', 'to' => '19:00', 'created_at' => '2024-09-08 13:53:09', 'updated_at'=> '2024-09-08 13:53:09'],
            ['purpose_id' => 6, 'subject_id' => 14 , 'day_id' => 2 , 'from' => '17:00', 'to' => '18:30', 'created_at' => '2024-09-08 13:54:36', 'updated_at'=> '2024-09-08 13:54:36'],
            ['purpose_id' => 6, 'subject_id' => 19 , 'day_id' => 3 , 'from' => '17:00', 'to' => '18:30', 'created_at' => '2024-09-08 13:54:55', 'updated_at'=> '2024-09-08 13:54:55'],
            ['purpose_id' => 6, 'subject_id' => 6 , 'day_id' => 3 , 'from' => '18:30', 'to' => '20:00', 'created_at' => '2024-09-08 13:55:08', 'updated_at'=> '2024-09-08 13:55:08'],
            ['purpose_id' => 6, 'subject_id' => 3 , 'day_id' => 4 , 'from' => '17:00', 'to' => '18:30', 'created_at' => '2024-09-08 13:55:22', 'updated_at'=> '2024-09-08 13:55:22'],
            ['purpose_id' => 6, 'subject_id' => 3 , 'day_id' => 7 , 'from' => '13:00', 'to' => '14:30', 'created_at' => '2024-09-08 13:55:40', 'updated_at'=> '2024-09-08 13:55:40'],
            ['purpose_id' => 6, 'subject_id' => 3 , 'day_id' => 7 , 'from' => '14:30', 'to' => '16:00', 'created_at' => '2024-09-08 13:56:08', 'updated_at'=> '2024-09-08 13:56:08'],
            ['purpose_id' => 6, 'subject_id' => 4 , 'day_id' => 7 , 'from' => '16:00', 'to' => '17:30', 'created_at' => '2024-09-08 13:56:24', 'updated_at'=> '2024-09-08 13:56:24'],
            ['purpose_id' => 6, 'subject_id' => 3 , 'day_id' => 7 , 'from' => '17:30', 'to' => '19:00', 'created_at' => '2024-09-08 13:56:40', 'updated_at'=> '2024-09-08 13:56:40'],
            ['purpose_id' => 4, 'subject_id' => 15 , 'day_id' => 2 , 'from' => '18:30', 'to' => '20:00', 'created_at' => '2024-09-08 13:58:05', 'updated_at'=> '2024-09-08 13:58:05'],
            ['purpose_id' => 4, 'subject_id' => 5 , 'day_id' => 2 , 'from' => '20:00', 'to' => '21:30', 'created_at' => '2024-09-08 13:58:28', 'updated_at'=> '2024-09-08 13:58:28'],
            ['purpose_id' => 4, 'subject_id' => 19 , 'day_id' => 3 , 'from' => '17:00', 'to' => '18:30', 'created_at' => '2024-09-08 13:58:45', 'updated_at'=> '2024-09-08 13:58:45'],
            ['purpose_id' => 4, 'subject_id' => 8 , 'day_id' => 3 , 'from' => '20:00', 'to' => '21:30', 'created_at' => '2024-09-08 13:59:36', 'updated_at'=> '2024-09-08 13:59:36'],
            ['purpose_id' => 4, 'subject_id' => 18 , 'day_id' => 4 , 'from' => '18:30', 'to' => '20:00', 'created_at' => '2024-09-08 13:59:50', 'updated_at'=> '2024-09-08 13:59:50'],
            ['purpose_id' => 4, 'subject_id' => 7 , 'day_id' => 4 , 'from' => '20:00', 'to' => '21:30', 'created_at' => '2024-09-08 14:00:02', 'updated_at'=> '2024-09-08 14:00:02'],
            ['purpose_id' => 4, 'subject_id' => 9 , 'day_id' => 5 , 'from' => '18:30', 'to' => '20:00', 'created_at' => '2024-09-08 14:00:19', 'updated_at'=> '2024-09-08 14:00:19'],
            ['purpose_id' => 4, 'subject_id' => 20 , 'day_id' => 5 , 'from' => '20:00', 'to' => '21:30', 'created_at' => '2024-09-08 14:00:32', 'updated_at'=> '2024-09-08 14:00:32'],
            ['purpose_id' => 4, 'subject_id' => 12 , 'day_id' => 6 , 'from' => '17:00', 'to' => '18:30', 'created_at' => '2024-09-08 14:00:47', 'updated_at'=> '2024-09-08 14:00:47'],
            ['purpose_id' => 4, 'subject_id' => 4 , 'day_id' => 1 , 'from' => '12:00', 'to' => '13:30', 'created_at' => '2024-09-08 14:01:06', 'updated_at'=> '2024-09-08 14:01:06'],
            ['purpose_id' => 4, 'subject_id' => 10 , 'day_id' => 1 , 'from' => '14:00', 'to' => '15:30', 'created_at' => '2024-09-08 14:01:25', 'updated_at'=> '2024-09-08 14:01:25'],
            ['purpose_id' => 4, 'subject_id' => 13 , 'day_id' => 1 , 'from' => '16:00', 'to' => '17:30', 'created_at' => '2024-09-08 14:01:39', 'updated_at'=> '2024-09-08 14:01:39'],
            ['purpose_id' => 4, 'subject_id' => 17 , 'day_id' => 1 , 'from' => '17:30', 'to' => '19:00', 'created_at' => '2024-09-08 14:01:52', 'updated_at'=> '2024-09-08 14:01:52'],
            ['purpose_id' => 4, 'subject_id' => 16 , 'day_id' => 1 , 'from' => '19:00', 'to' => '20:30', 'created_at' => '2024-09-08 14:02:06', 'updated_at'=> '2024-09-08 14:02:06'],
            ['purpose_id' => 3, 'subject_id' => 1 , 'day_id' => 2 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:03:08', 'updated_at'=> '2024-09-08 14:03:08'],
            ['purpose_id' => 3, 'subject_id' => 1 , 'day_id' => 3 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:03:23', 'updated_at'=> '2024-09-08 14:03:23'],
            ['purpose_id' => 3, 'subject_id' => 1 , 'day_id' => 4 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:03:59', 'updated_at'=> '2024-09-08 14:03:59'],
            ['purpose_id' => 3, 'subject_id' => 1 , 'day_id' => 5 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:04:11', 'updated_at'=> '2024-09-08 14:04:11'],
            ['purpose_id' => 3, 'subject_id' => 1 , 'day_id' => 6 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:04:23', 'updated_at'=> '2024-09-08 14:04:23'],
            ['purpose_id' => 3, 'subject_id' => 2 , 'day_id' => 3 , 'from' => '18:00', 'to' => '19:00', 'created_at' => '2024-09-08 14:04:47', 'updated_at'=> '2024-09-08 14:04:47'],
            ['purpose_id' => 3, 'subject_id' => 2 , 'day_id' => 6 , 'from' => '18:30', 'to' => '19:30', 'created_at' => '2024-09-08 14:05:00', 'updated_at'=> '2024-09-08 14:05:00'],
            ['purpose_id' => 2, 'subject_id' => 1 , 'day_id' => 2 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:07:29', 'updated_at'=> '2024-09-08 14:07:29'],
            ['purpose_id' => 2, 'subject_id' => 1 , 'day_id' => 3 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:07:41', 'updated_at'=> '2024-09-08 14:07:41'],
            ['purpose_id' => 2, 'subject_id' => 1 , 'day_id' => 4 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:07:58', 'updated_at'=> '2024-09-08 14:07:58'],
            ['purpose_id' => 2, 'subject_id' => 1 , 'day_id' => 5 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:08:10', 'updated_at'=> '2024-09-08 14:08:10'],
            ['purpose_id' => 2, 'subject_id' => 1 , 'day_id' => 6 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:08:26', 'updated_at'=> '2024-09-08 14:08:26'],
            ['purpose_id' => 2, 'subject_id' => 2 , 'day_id' => 3 , 'from' => '18:00', 'to' => '19:00', 'created_at' => '2024-09-08 14:08:45', 'updated_at'=> '2024-09-08 14:08:45'],
            ['purpose_id' => 2, 'subject_id' => 2 , 'day_id' => 6 , 'from' => '18:30', 'to' => '19:30', 'created_at' => '2024-09-08 14:09:05', 'updated_at'=> '2024-09-08 14:09:05'],
            ['purpose_id' => 1, 'subject_id' => 1 , 'day_id' => 2 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:09:57', 'updated_at'=> '2024-09-08 14:09:57'],
            ['purpose_id' => 1, 'subject_id' => 1 , 'day_id' => 3 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:10:15', 'updated_at'=> '2024-09-08 14:10:15'],
            ['purpose_id' => 1, 'subject_id' => 1 , 'day_id' => 4 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-08 14:10:28', 'updated_at'=> '2024-09-08 14:10:28'],
            ['purpose_id' => 1, 'subject_id' => 1 , 'day_id' => 5 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-09 11:21:50', 'updated_at'=> '2024-09-09 11:21:50'],
            ['purpose_id' => 1, 'subject_id' => 1 , 'day_id' => 6 , 'from' => '15:00', 'to' => '22:00', 'created_at' => '2024-09-09 11:22:03', 'updated_at'=> '2024-09-09 11:22:03'],
            ['purpose_id' => 1, 'subject_id' => 2 , 'day_id' => 3 , 'from' => '18:00', 'to' => '19:00', 'created_at' => '2024-09-09 11:22:25', 'updated_at'=> '2024-09-09 11:22:25'],
            ['purpose_id' => 1, 'subject_id' => 2 , 'day_id' => 6 , 'from' => '18:30', 'to' => '19:30', 'created_at' => '2024-09-09 11:22:50', 'updated_at'=> '2024-09-09 11:22:50'],
        ]);
    }
}
