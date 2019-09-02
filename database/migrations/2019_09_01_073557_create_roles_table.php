<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->integer('id');
            // 15
            $table->string('role_name',15);
            // Manga Permission
            $table->boolean('create-manga')->default(0);
            $table->boolean('view-manga')->default(0);
            $table->boolean('update-manga')->default(0);
            $table->boolean('delete-manga')->default(0);
            // User permission
            $table->boolean('create-user')->default(0);
            $table->boolean('view-user')->default(0);
            $table->boolean('update-user')->default(0);
            $table->boolean('delete-user')->default(0);
            // Group permission
            $table->boolean('create-group')->default(0);
            $table->boolean('view-group')->default(0);
            $table->boolean('update-group')->default(0);
            $table->boolean('delete-group')->default(0);
            $table->boolean('add-copyright')->default(0);
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
        Schema::dropIfExists('roles');
    }
}
