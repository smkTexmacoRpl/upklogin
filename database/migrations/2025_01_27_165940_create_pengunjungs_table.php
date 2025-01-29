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
         Schema::create('pengunjungs', function (Blueprint $table) {
            $table->string('id_pengunjung', 20)->primary(); // Primary Key
            $table->string('nama_pengunjung',50);
            $table->text('alamat')->nullable();
            $table->enum('JK', ['Laki-laki', 'Perempuan'])->nullable();
            $table->bigInteger('no_tlp')->nullable();
            $table->bigInteger('no_ktp')->nullable();
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengunjungs');
    }
};
