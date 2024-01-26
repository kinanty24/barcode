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
        Schema::create('data_dosen', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->string('nidn');
            $table->string('id_matkul');
            $table->string('days');
            $table->time('start');
            $table->time('end');
            $table->string('barcode');
            $table->date('ttl');
            $table->string('agama');
            $table->string('jk');
            $table->string('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_dosen');
    }
};
