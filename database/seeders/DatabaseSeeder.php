<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Seeders\User;
use Illuminate\Database\Seeders\Cateogry;
use Illuminate\Database\Seeders\StudyLog;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UsersSeeder::class,
            CategorySeeder::class,
            StudyLogSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        StudyLog::factory(10)->create();
    }
}
