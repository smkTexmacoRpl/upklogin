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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->integer('no_transaksi')->autoIncrement()->primary();
            $table->string('pengunjung_id',20);
            $table->foreign('pengunjung_id')->references('id_pengunjung')->on('pengunjungs')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('jml_kamar');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->integer('jml_hari');
            $table->bigInteger('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
