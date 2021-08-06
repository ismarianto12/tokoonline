<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tminstansi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tminstansi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode',30);
            $table->string('nama_instansi', 30);
            $table->text('alamat');
            $table->string('email', 30);
            $table->string('no_telp', 30);
            $table->string('jalan', 30);
            $table->string('kepala', 30);
            $table->string('pengukuhan', 30);
            $table->string('perda_dasr', 30);
            $table->string('user_id', 30);
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
        //
    }
}
