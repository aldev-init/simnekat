<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_guru', function (Blueprint $table) {
            $table->id();
            $table->char('nip', 18)->nullable();
            $table->string('nama',150);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('agama',30)->nullable();
            $table->text('alamat')->nullable();
            $table->string('tempat_lahir',30)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('foto')->nullable();
            $table->tinyInteger('status_ptk')->default(0);
            $table->bigInteger('user_id')->unsigned(); //harus inisialisasi colom dlu
            $table->foreign('user_id')
                    ->on('users')
                    ->references('id')
                    ->onDelete('set null')
                    ->onUpdate('set null');
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
        Schema::dropIfExists('data_guru');
    }
}
