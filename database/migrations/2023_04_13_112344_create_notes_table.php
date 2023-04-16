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
            $table->id();
            $table->timestamps();
            
            $table->string('name');
            $table->string('description');
            $table->string('cord_txt');
            $table->string('url_txt');
            
            $table->integer('user_id');
            $table->integer('bookmark_id');
            $table->integer('note_tag_id');
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
