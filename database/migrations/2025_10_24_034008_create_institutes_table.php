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
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->string('initials', 191)->nullable();
            $table->text('description')->nullable();
            $table->text('vmo')->nullable(); // Vision, Mission, Objectives
            $table->text('slug')->nullable();
            $table->string('logo', 191)->nullable();
            $table->string('cover_photo', 191)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutes');
    }
};
