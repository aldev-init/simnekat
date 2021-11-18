<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_mou', function (Blueprint $table) {
            $table->id();
            $table->integer('jurusan_id')->unsigned(); //harus inisialisasi colom dlu
            $table->string('file');
            $table->text('keterangan');
            $table->timestamps();
        });

        Schema::table('data_mou', function (Blueprint $table) {
            $table->foreign('jurusan_id')
                    ->references('id')
                    ->on('data_jurusan')
                    ->onDelete('set null')
                    ->onUpdate('set null');
            $table->foreign('perusahaan_id')
                    ->references('id')
                    ->on('data_perusahaan')
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
        Schema::dropIfExists('data_mou');
    }
}
