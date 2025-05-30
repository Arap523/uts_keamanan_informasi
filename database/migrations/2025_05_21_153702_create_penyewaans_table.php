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
        Schema::create('penyewaans', function (Blueprint $table) {
             $table->id();
    $table->foreignId('kendaraan_id')->constrained();
    $table->string('penyewa');
    $table->string('no_ktp');
    $table->string('no_sim');
     $table->string('alamat');
    $table->date('tanggal_sewa');
    $table->date('tanggal_kembali')->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaans');
    }
};
