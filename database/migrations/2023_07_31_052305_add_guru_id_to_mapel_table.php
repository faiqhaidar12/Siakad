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
    public function up()
    {
        Schema::table('mapel', function (Blueprint $table) {
            // Tambahkan kolom guru_id
            $table->unsignedBigInteger('guru_id')->after('nama_mapel');

            // Definisi foreign key untuk menghubungkan kolom guru_id dengan tabel guru
            $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mapel', function (Blueprint $table) {
            // Hapus foreign key jika ada
            $table->dropForeign(['guru_id']);

            // Hapus kolom guru_id
            $table->dropColumn('guru_id');
        });
    }
};
