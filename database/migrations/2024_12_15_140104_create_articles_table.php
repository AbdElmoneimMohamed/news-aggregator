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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->text('description')->nullable();
            $table->string('author')->nullable();
            $table->string('source')->nullable();
            $table->string('category')->nullable();
            $table->string('content')->nullable();
            $table->timestamp('published_at')->nullable();;
            $table->timestamps();

            $table->index('author');
            $table->index('category');
            $table->index('source');
            $table->index('published_at');
            $table->fullText(['title', 'description', 'content']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
