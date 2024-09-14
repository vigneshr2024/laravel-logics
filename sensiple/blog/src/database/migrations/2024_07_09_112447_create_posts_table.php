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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('short_description')->nullable();
            $table->string('thumbnail_image')->nullable()->default('');
            $table->string('banner_image')->nullable()->default('');
            $table->longText('content')->nullable();
            $table->date('publish_date');
            $table->string('post_url')->unique();
            $table->string('visibility');
            $table->string('post_type');
            $table->string('client')->nullable();
            $table->string('location')->nullable();
            $table->string('is_default')->default(0);
            $table->bigInteger('created_by')->default(0);
            $table->bigInteger('updated_by')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
