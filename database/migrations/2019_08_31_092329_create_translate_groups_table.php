<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translate_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('language_translate',3);
            $table->string('uniqueString');
            $table->integer('leader_id')->nullable();
            $table->string('logo')->default('default.png');
            $table->integer('follows')->default("0");
            $table->integer('points')->default("0");
            $table->timestamps();
        });

        Schema::create('mangas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('logo')->default('default.png');
            $table->string('language','3');
            $table->string('uniqueString');
            $table->unsignedBigInteger('group_id')->nullable(true);
            $table->foreign('group_id')->references('id')->on('translate_groups')->onDelete('set null');
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
        Schema::dropIfExists('mangas');
        Schema::dropIfExists('translate_groups');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
