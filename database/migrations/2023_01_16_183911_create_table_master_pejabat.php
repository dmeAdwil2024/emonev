<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMasterPejabat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbm_pejabat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pejabat', 255);
            $table->string('jabatan', 255);
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('type');
            $table->string('keterangan', 255)->nullable();
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
        Schema::dropIfExists('tbm_pejabat');
    }
}
