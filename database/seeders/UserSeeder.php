<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'defaultUser',
                'email' => Str::random(5).'@example.com',
                'password' => Hash::make('password'),
                'eamil_varified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'testUser01',
                'email' => Str::random(5).'@example.com',
                'password' => Hash::make('password'),
                'eamil_varified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'testUser02',
                'email' => Str::random(5).'@example.com',
                'password' => Hash::make('password'),
                'eamil_varified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
