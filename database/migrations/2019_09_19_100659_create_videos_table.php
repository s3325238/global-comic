<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');

            $table->text('source');
            $table->unsignedBigInteger('manga_id');

            $table->foreign('manga_id')->references('id')->on('mangas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('chapter');
            $table->string('source');
            $table->unsignedBigInteger('manga_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('chapter_id');
            $table->unsignedBigInteger('uploaded_by')->nullable(true);
            $table->datetime('published_time')->nullable(true);
            $table->boolean('is_published')->default(false);

            $table->foreign('manga_id')->references('id')->on('mangas')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('translate_groups')->onDelete('cascade');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('set null');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('chapters');
        Schema::dropIfExists('videos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
