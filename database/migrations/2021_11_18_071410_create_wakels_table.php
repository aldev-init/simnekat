<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWakelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wakel', function (Blueprint $table) {
            $table->id();
            $table->integer('guru_id')->unsigned(); //harus inisialisasi colom dlu
            $table->integer('kelas_id')->unsigned(); //harus inisialisasi colom dlu
            $table->integer('jurusan_id')->unsigned(); //harus inisialisasi colom dlu
            $table->year('tahun_ajaran');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::table('wakel', function (Blueprint $table) {
            $table->foreign('guru_id')
                    ->references('id')
                    ->on('data_guru')
                    ->onDelete('set null')
                    ->onUpdate('set null');
            $table->foreign('kelas_id')
                    ->references('id')
                    ->on('data_kelas')
                    ->onDelete('set null')
                    ->onUpdate('set null');
            $table->foreign('jurusan_id')
                    ->references('id')
                    ->on('data_jurusan')
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
        Schema::dropIfExists('wakel');
    }
}
