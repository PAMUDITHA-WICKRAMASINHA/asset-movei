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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();;
            $table->string('image')->nullable();
            $table->string('duration')->nullable();
            $table->text('description')->nullable();
            // $table->integer('director')->nullable();
            // $table->integer('top_cast')->nullable();
            // $table->integer('category')->nullable();
            $table->date('release_date')->nullable();
            $table->string('file_data')->nullable();
            $table->string('trailer')->nullable();
            $table->integer('download_count')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};