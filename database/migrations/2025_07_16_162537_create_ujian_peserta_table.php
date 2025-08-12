<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ujian_peserta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // tanpa after()
            $table->string('custom_id');           // tanpa after()
            $table->unsignedBigInteger('jadwal_ujian_id');
            $table->string('nomor_peserta')->nullable(); // Diisi saat diverifikasi
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->string('kota_lahir');
            $table->string('dojang');
            $table->string('geup');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('foto')->nullable(); // path foto
            $table->string('bukti_pembayaran')->nullable(); // path bukti
            $table->enum('status', ['pending', 'verified', 'rejected', 'lulus', 'tidak_lulus'])->default('pending');
            $table->timestamps();

            $table->foreign('jadwal_ujian_id')->references('id')->on('jadwal_ujians')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // juga relasi user
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ujian_peserta');
    }
};
