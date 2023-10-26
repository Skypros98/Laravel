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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->char('npm', 10);
            $table->String('nama', 50);
            $table->String('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('foto', 50);
            $table->uuid('prodi_id');
            $table->foreign('prodi_id')->references('id')->on('prodis')->restrictOnDelete()->restrictOnUpdate();
            $table->uuid('fakultas_id');
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->restrictOnDelete()->restrictOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
