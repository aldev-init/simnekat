<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_jadwal', function (Blueprint $table) {
            $table->id();
            $table->integer('nama_mapel_id')->unsigned(); //harus inisialisasi colom dlu
            $table->time('jam');
            $table->string('hari',10);
            $table->integer('nama_kelas_id')->unsigned(); //harus inisialisasi colom dlu
            // $table->foreignId('nama_guru_id');
            $table->integer('kode_semester');
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::table('data_jadwal', function (Blueprint $table) {
            $table->foreign('nama_mapel_id')
                    ->references('id')
                    ->on('guru_mapel')
                    ->onDelete('set null')
                    ->onUpdate('set null');
            $table->foreign('nama_kelas_id')
                    ->references('id')
                    ->on('data_kelas')
                    ->onDelete('set null')
                    ->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_jadwal');
    }
}
