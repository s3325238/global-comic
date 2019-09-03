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
            $table->boolean('create-manga')->default(false);
            $table->boolean('view-manga')->default(false);
            $table->boolean('update-manga')->default(false);
            $table->boolean('delete-manga')->default(false);
            // User permission
            $table->boolean('create-user')->default(false);
            $table->boolean('view-user')->default(false);
            $table->boolean('update-user')->default(false);
            $table->boolean('delete-user')->default(false);
            // Group permission
            $table->boolean('create_group')->default(false);
            $table->boolean('view_group')->default(false);
            $table->boolean('update_group')->default(false);
            $table->boolean('delete_group')->default(false);
            $table->boolean('add_copyright')->default(false);
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
