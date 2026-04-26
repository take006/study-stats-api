<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use Laravel\Sanctum\Sanctum;

class StudyLogApiTest extends TestCase
{
    use RefreshDatabase; //テストごとにDBをリフレッシュする機能

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    //学習記録createテスト
    public function test_study_log_can_be_created(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create(['user_id' => $user->id]);
        Sanctum::actingAs($user);

        $payload = [
            'category_id' => $category->id,
            'duration_minutes' => 60,
            'study_date' => '2026-02-09',
            'content' => 'test content',
        ];
        $response = $this->postJson('/api/study-logs', $payload);

        $response->assertStatus(201)
        ->assertJsonPath('data.category_id', $category->id);

        $this->assertDatabaseHas('study_logs', [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'duration_minutes' => 60,
            'study_date' => '2026-02-09',
            'content' => 'test content',
        ]);
    }
}
