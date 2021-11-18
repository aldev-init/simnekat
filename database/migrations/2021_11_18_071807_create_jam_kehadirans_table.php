<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJamKehadiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jam_kehadiran', function (Blueprint $table) {
            $table->id();
            $table->integer('guru_id')->unsigned(); //harus inisialisasi colom dlu
            $table->dateTime('tanggal_kehadiran');
            $table->text('keterangan');
            $table->timestamps();
        });
        Schema::table('jam_kehadiran', function (Blueprint $table) {
            $table->foreign('guru_id')
                    ->references('id')
                    ->on('data_guru')
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
        Schema::dropIfExists('jam_kehadiran');
    }
}
