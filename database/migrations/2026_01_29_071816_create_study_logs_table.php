<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('study_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->index();
            //単体index
            $table->uuid('category_id')->index()->onDelete('set null');

            $table->unsignedInteger('minutes');
            $table->date('study_date');
            $table->text('content')->nullable();
            $table->string('image_path')->nullable();

            $table->timestamps();
            $table->softDeletes();

            //複合インデックス
            $table->index(['user_id', 'study_date']);
            $table->index(['user_id', 'category_id']);
            //FK
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_logs');
    }
};
