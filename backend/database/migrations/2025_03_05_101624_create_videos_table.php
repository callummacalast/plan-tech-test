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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('thumbnail_url');
            $table->integer('duration');
            $table->dateTime('uploaded_at');
            $table->bigInteger('views')->default(0);
            $table->string('author');
            $table->string('video_url');
            $table->text('description')->nullable();
            $table->integer('subscriber_count')->default(0);
            $table->boolean('live')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
