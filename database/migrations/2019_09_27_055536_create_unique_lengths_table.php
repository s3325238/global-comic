<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniqueLengthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unique_lengths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('video_length')->default(40);
            $table->integer('chapter_length')->default(40);
            $table->integer('manga_length')->default(40);
            $table->integer('role_length')->default(40);
            $table->text('random_array');
            $table->integer('random_number');
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
        Schema::dropIfExists('unique__lengths');
    }
}
