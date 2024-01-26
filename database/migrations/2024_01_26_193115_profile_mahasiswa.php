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
        Schema::create('profile_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique(); // Nim sebagai string unik
            $table->string('nama');
            $table->date('ttl'); // Tanggal lahir sebagai tipe data tanggal
            $table->char('jk', 1); // Jenis kelamin sebagai karakter (contoh: 'L' atau 'P')
            $table->string('agama');
            $table->text('alamat');
            $table->string('prodi');
            $table->unsignedBigInteger('user_id'); // ID pengguna sebagai kunci asing
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users'); // Relasi ke tabel users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_mahasiswa');
    }
};
