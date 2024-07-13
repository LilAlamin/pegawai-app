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
        Schema::create('Pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('NIK');
            $table->string('nama_pegawai');
            $table->string('provinsi')->nullable();
            $table->string('alamat');
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
            $table->boolean('IsDelete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pegawai');
    }
};
