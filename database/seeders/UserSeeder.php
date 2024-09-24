<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            ['name' => 'David', 'email' => 'ps.shim87@gmail.com', 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => '관리자', 'email' => 'yeilsound@naver.com', 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
