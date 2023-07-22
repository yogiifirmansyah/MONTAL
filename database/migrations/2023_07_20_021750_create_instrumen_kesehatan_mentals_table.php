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
        Schema::create('instrumen_kesehatan_mentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->tinyText('item_1a');
            $table->tinyText('item_1b');
            $table->tinyText('item_1c');
            $table->tinyText('item_1d');
            $table->tinyText('item_2a');
            $table->tinyText('item_2b');
            $table->tinyText('item_2c');
            $table->tinyText('item_2d');
            $table->tinyText('item_2e');
            $table->tinyText('item_2f');
            $table->tinyText('item_3a');
            $table->tinyText('item_3b');
            $table->tinyText('item_3c');
            $table->tinyText('item_3d');
            $table->tinyText('item_3e');
            $table->tinyText('item_4a');
            $table->tinyText('item_4b');
            $table->tinyText('item_4c');
            $table->tinyText('item_4d');
            $table->tinyText('item_5a');
            $table->tinyText('item_5b');
            $table->tinyText('item_5c');
            $table->tinyText('item_5d');
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
        Schema::dropIfExists('instrumen_kesehatan_mentals');
    }
};
