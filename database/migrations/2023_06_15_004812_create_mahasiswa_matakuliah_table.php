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
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('mahasiswa_id')->nullable();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->unsignedBigInteger('matakuliah_id')->nullable();
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah');
            $table->string('nilai')->nullable();
            $table->timestamps();
            // $table->id()->primary();
            // // $table->bigInteger('mahasiswa_id', 20)->unsigned();
            // // $table->unsignedBigInteger('matakuliah_id',20);
            // $table->foreignId('mahasiswa_id')->unsigned()->constrained('mahasiswa');
            // $table->foreignId('matakuliah_id')->constrained('matakuliah');
            // $table->integer('nilai');
            // $table->timestamps();

            // // $table->foreign('mahasiswa_id')->references('NIM')->on('mahasiswa')->onDelete('cascade');
            // // $table->foreign('matakuliah_id')->references('id')->on('matakuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
};
