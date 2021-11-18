<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_siswa', function (Blueprint $table) {
            $table->id();
            $table->char('nipd', 9);
            $table->char('nisn', 10);
            $table->string('nama',150);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('agama',30)->nullable();
            $table->text('alamat')->nullable();
            $table->string('tempat_lahir',30)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('foto');
            $table->integer('kelas')->unsigned(); //harus inisialisasi colom dlu
            $table->integer('jurusan')->unsigned(); //harus inisialisasi colom dlu
            $table->integer('user_id')->unsigned(); //harus inisialisasi colom dlu
            $table->timestamps();
        });
        Schema::table('data_siswa', function (Blueprint $table) {
            $table->foreign('kelas')
                    ->references('id')
                    ->on('data_kelas')
                    ->onDelete('set null')
                    ->onUpdate('set null');
            $table->foreign('jurusan')
                    ->references('id')
                    ->on('data_jurusan')
                    ->onDelete('set null')
                    ->onUpdate('set null');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('data_siswa');
    }
}
