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
        Schema::create('revisi_gambars', function (Blueprint $table) {
            $table->id();
            #Relasi table#
            $table->unsignedBigInteger('id_project');
            $table->foreign('id_project')->references('id')->on('project_menus')->onDelete('cascade');
            $table->string('status_revisi');
            $table->string('judul_revisi');
            $table->string('keterangan_revisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisi_gambars');
    }
};
