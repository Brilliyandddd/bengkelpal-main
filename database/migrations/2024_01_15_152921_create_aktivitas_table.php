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
        Schema::create('aktivitas', function (Blueprint $table) {
            $table->id();
            #Relasi table#
            $table->unsignedBigInteger('id_project');
            $table->foreign('id_project')->references('id')->on('project_menus')->onDelete('cascade');
            $table->string('nama_aktivitas');
            $table->string('status_aktivitas');
            $table->date('start_aktivitas');
            $table->date('finish_aktivitas');
            $table->string('keterangan_aktivitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas');
    }
};
