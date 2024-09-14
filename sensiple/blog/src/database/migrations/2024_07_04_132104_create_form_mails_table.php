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
        Schema::create('form_mails', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_id');
            $table->string('from');
            $table->string('to');
            $table->string('subject')->nullable();
            $table->string('receive_message')->nullable();
            $table->string('attachment_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_mails');
    }
};
