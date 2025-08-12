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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ujian_peserta_id')->constrained('ujian_peserta')->onDelete('cascade');
            $table->float('poomsae_1')->nullable();
            $table->float('poomsae_2')->nullable();
            $table->float('gibon_dongjak')->nullable();
            $table->float('gibon_balchagi')->nullable();
            $table->float('kyourugi')->nullable();
            $table->float('kyupa')->nullable();
            $table->float('tes_fisik')->nullable();
            $table->float('tes_tulis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
