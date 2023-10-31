<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('filmss', function (Blueprint $table) {
            $table->id();
            $table->string('judul_film');
            $table->time('waktu');
            $table->date('tanggal_pemesanan');
            $table->char('row_kursi');
            $table->char('seat_kursi');
            $table->integer('jumlah_tiket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmss');
    }
};