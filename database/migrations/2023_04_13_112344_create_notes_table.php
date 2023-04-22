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
        Schema::create('notes', function (Blueprint $table) {
            $table->id()->nullable(false);
            $table->timestamps();
            
            $table->string('name')->nullable(false);
            $table->string('description')->nullable(false);
            $table->string('cord_txt');
            $table->string('url_txt');
            
            $table->integer('user_id')->constrained();
            $table->integer('bookmark_id')->constrained();
            $table->boolean('public_status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
