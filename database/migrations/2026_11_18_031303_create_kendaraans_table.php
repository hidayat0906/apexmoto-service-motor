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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->string('no_plat', 15)->primary(); // Contoh: BL 1234 AB
            $table->enum('jenis_kendaraan', ['Matic', 'Manual Transmisi']);
            $table->string('no_stnk', 30);
            $table->year('tahun_pembuatan');
            $table->string('nama_pemilik', 100);
            $table->string('warna_kendaraan', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
