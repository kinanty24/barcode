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
        Schema::create('rekap_absen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa'); // ID mahasiswa sebagai kunci asing
            $table->unsignedBigInteger('id_dosen'); // ID dosen sebagai kunci asing
            $table->date('tanggal'); // Tanggal absensi
            $table->timestamps();

            // Menambahkan indeks pada kolom-kolom yang sering dicari
            $table->index(['id_mahasiswa', 'id_dosen', 'tanggal']);

            // Menambahkan kunci asing
            $table->foreign('id_mahasiswa')->references('id')->on('profile_mahasiswa');
            $table->foreign('id_dosen')->references('id')->on('profile_dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_absen');
    }
};
