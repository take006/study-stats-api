<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Default Categories
        DB::table('categories')->insert([
            [
                'id' => Str::uuid(),
                'user_id' => null,
                'name' => 'PHP',
                'color_code' => '#d0e075',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'user_id' => null,
                'name' => 'JavaScript',
                'color_code' => '#888888',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'user_id' => null,
                'name' => 'AWS',
                'color_code' => '#1c1b2c',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        //factoryを使用してテストデータを挿入
        User::all()->each(function ($user) {
            Category::factory()
                ->count(3)
                ->create([
                    'user_id' => $user->id,
                ]);
        });

    }
}
