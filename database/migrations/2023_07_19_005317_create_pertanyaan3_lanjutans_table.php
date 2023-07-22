<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan3_lanjutans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pertanyaan_umum_id');
            $table->tinyText('item_1');
            $table->tinyText('item_2');
            $table->tinyText('item_3');
            $table->tinyText('item_4');
            $table->tinyText('item_5');
            $table->tinyText('item_6');
            $table->timestamps();

            $table->foreign('pertanyaan_umum_id')->references('id')->on('pertanyaan_umums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaan3_lanjutans');
    }
};
