<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestingNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testing_new', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->string('metode_pengadaan');
            $table->string('jenis_pengadaan');
            $table->string('pagu');
            $table->integer('pagu_angka');
            $table->string('bulan');
            $table->integer('bulan_angka');
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
        Schema::dropIfExists('testing_new');
    }
}
