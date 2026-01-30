<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('user_id')->nullable()->index();
            $table->string('name');
            $table->string('color_code', 7)->default('#999999');

            // 複合ユニーク制約（同一ユーザー内でカテゴリ名一意）
            $table->unique(['user_id', 'name']);

            $table->timestamps();

            // 外部キー制約
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
