<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarPelanggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_pelanggaran', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_prodi')->constrained('program_studi');
            $table->foreignId('id_mahasiswa')->constrained('mahasiswa');
            $table->foreignId('id_pelanggaran')->constrained('pelanggaran');
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_item')->constrained('item');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_pelanggaran');
    }
}
