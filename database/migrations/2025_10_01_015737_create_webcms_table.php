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
        Schema::create('webcms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_published')->default(false);
            $table->string('section', 191);
            $table->string('tag', 191);
            $table->text('title');
            $table->text('featured');
            $table->longText('body');
            $table->string('cover_image')->nullable();
            $table->string('slug', 191)->nullable();
            $table->date('posted_at')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webcms');
    }
};
