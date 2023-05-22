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
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->cascadeOnUpdate()->cascadeOnDelete();
            $table->longText('text_header')->nullable();
            $table->longText('text_body')->nullable();
            $table->longText('text_footer')->nullable();
            $table->longText('text_button')->nullable();
            $table->longText('title')->nullable();
            $table->json('body')->nullable();
            $table->longText('notes_1')->nullable();
            $table->longText('notes_2')->nullable();
            $table->longText('notes_3')->nullable();
            $table->longText('notes_4')->nullable();
            $table->longText('notes_5')->nullable();
            $table->longText('notes_6')->nullable();
            $table->longText('notes_7')->nullable();
            $table->longText('notes_8')->nullable();
            $table->longText('notes_9')->nullable();
            $table->longText('notes_10')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lists');
    }
};
