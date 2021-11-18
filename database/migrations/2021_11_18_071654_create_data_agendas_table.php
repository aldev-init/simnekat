<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_agenda', function (Blueprint $table) {
            $table->id();
            $table->string('nama_acara',100);
            $table->string('nama_penyelenggara',30);
            $table->text('tempat');
            $table->text('deskripsi');
            $table->dateTime('tanggal');
            $table->dateTime('due_date');
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
        Schema::dropIfExists('data_agenda');
    }
}
