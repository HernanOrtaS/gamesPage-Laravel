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
        Schema::create('playings', function (Blueprint $table) {
            $table->id();
            $table->string('name_match')->default('Match');
            $table->integer('size')->default(8);
            $table->integer('rows')->default(3);
            $table->boolean('turn')->default(0);
            $table->foreignId('player_01')
                ->constrained('users', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('player_02')
                ->constrained('users', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playings');
    }
};
