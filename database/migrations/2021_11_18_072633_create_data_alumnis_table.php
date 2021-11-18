<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nama',150);
            $table->year('angkatan');
            $table->integer('jurusan_id')->unsigned(); //harus inisialisasi colom dlu
            $table->year('tahun_lulus');
            $table->string('status',100);
            $table->text('keterangan');
            $table->timestamps();
        });

        Schema::table('data_alumni', function (Blueprint $table) {
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
        Schema::dropIfExists('data_alumni');
    }
}
