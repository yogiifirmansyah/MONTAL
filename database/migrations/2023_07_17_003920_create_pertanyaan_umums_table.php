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
        Schema::create('pertanyaan_umums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->tinyText('item_1');
            $table->tinyText('item_2');
            $table->tinyText('item_3');
            $table->tinyText('item_4');
            $table->tinyText('item_5');
            $table->tinyText('item_6');
            $table->tinyText('item_7');
            $table->tinyText('item_8');
            $table->tinyText('item_9');
            $table->tinyText('item_10');
            $table->tinyText('item_11');
            $table->tinyText('item_12');
            $table->tinyText('item_13');
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaan_umums');
    }
};
