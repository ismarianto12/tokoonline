<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tuploaddownload extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmuploaddonwload', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tmunitkerja_id', 30);
            $table->string('tmparameterdoc_id', 30);
            $table->string('namafile', 30);
            $table->text('ket');
            $table->string('kode_file', 30);
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
