<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testing', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('metode_pengadaan');
            $table->string('jenis_pengadaan');
            $table->string('pagu');
            $table->string('bulan');
            $table->integer('kelas_asli');
            $table->integer('kelas_predict')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testing');
    }
}
