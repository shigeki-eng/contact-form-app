<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $param = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ];
        DB::table('users')->insert($param);
    }
}
