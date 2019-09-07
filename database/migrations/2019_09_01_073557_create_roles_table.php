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
            $table->integer('id')->unique();
            // 15
            $table->string('role_name',15);
            // Manga Permission
            $table->boolean('create_manga')->default(false);
            $table->boolean('view_manga')->default(false);
            $table->boolean('update_manga')->default(false);
            $table->boolean('delete_manga')->default(false);
            // User permission
            $table->boolean('create_user')->default(false);
            $table->boolean('view_user')->default(false);
            $table->boolean('update_user')->default(false);
            $table->boolean('delete_user')->default(false);
            // Group permission
            $table->boolean('create_group')->default(false);
            $table->boolean('view_group')->default(false);
            $table->boolean('update_group')->default(false);
            $table->boolean('delete_group')->default(false);

            // Other permission
            $table->boolean('add_copyright')->default(false);
            $table->boolean('view_settings')->default(false);
            
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
