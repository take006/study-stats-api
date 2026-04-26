<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;

class StudyLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('study_logs')->insert([
            [
                'user_id' => User::query()->value('id'),
                'category_id' => Category::query()->value('id'),
                'duration_minutes' => 40,
                'study_date' => '2026-02-01',
                'content' => 'efaowrgargakokg',
                'created_at' => now(),
                'updated_at' => now(),
                'image_path' => 'sample-image.jpg',
            ],
        ]);
    }
}
