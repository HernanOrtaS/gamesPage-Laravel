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
        Schema::create('current_matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playingId')
                ->constrained('playings', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->json('pieces_player_01');
            $table->json('pieces_player_02');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('current_matches');
    }
};
