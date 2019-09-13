<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradeMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_marks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('manga_id');

            $table->string('language',3)->nullable(false);

            $table->foreign('group_id')->references('id')->on('translate_groups')->onDelete('cascade');
            $table->foreign('manga_id')->references('id')->on('mangas')->onDelete('cascade');

            $table->timestamps();
        });

        // Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trade_marks');
    }
}
