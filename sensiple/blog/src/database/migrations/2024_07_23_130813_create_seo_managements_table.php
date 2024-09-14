<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seo_managements', function (Blueprint $table) {
            $table->id();
            $table->string('sitemap_file_location')->nullable();
            $table->string('robots_file_location')->nullable();
            $table->text('header_tags')->nullable();
            $table->text('footer_tags')->nullable();
            $table->dateTime('sitemap_updated_at')->nullable();
            $table->dateTime('robots_updated_at')->nullable();
            $table->dateTime('header_tags_updated_at')->nullable();
            $table->dateTime('footer_tags_updated_at')->nullable();
            $table->bigInteger('created_by')->default(0);
            $table->bigInteger('updated_by')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
        // Default seeding record
        DB::table('seo_managements')->insert([
            'created_by'    => 0,
            'updated_by'    => 0,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_managements');
    }
};
