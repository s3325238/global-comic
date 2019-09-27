<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaderMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leader_members', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('leader_id')->nullable(true);
            $table->unsignedBigInteger('member_id')->unique();
            $table->integer('position')->nullable(true);

            $table->foreign('leader_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('leader_members');
    }
}
