<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruMapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_mapel', function (Blueprint $table) {
            $table->id();
            $table->integer('guru_id')->unsigned(); //harus inisialisasi colom dlu
            $table->integer('mapel_id')->unsigned(); //harus inisialisasi colom dlu
            $table->timestamps();
        });

        Schema::table('guru_mapel', function (Blueprint $table) {
            $table->foreign('guru_id')
                    ->references('id')
                    ->on('data_guru')
                    ->onDelete('set null')
                    ->onUpdate('set null');
            $table->foreign('mapel_id')
                    ->references('id')
                    ->on('data_mapel')
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
        Schema::dropIfExists('guru_mapel');
    }
}
