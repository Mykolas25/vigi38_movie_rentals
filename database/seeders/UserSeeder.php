<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Mykolas',
            'email' => 'test@test.test',
            'password' => Hash::make('secret'),
            'created_at' => Date::now(),
            'updated_at' => Date::now()
        ]);
    }
}
