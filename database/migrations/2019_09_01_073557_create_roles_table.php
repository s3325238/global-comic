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
            $table->string('uniqueString');
            // type
            $table->boolean('moderator')->default(false);
            $table->boolean('leader')->default(false);
            $table->boolean('vice_leader')->default(false);
            $table->boolean('member')->default(false);
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
            // Video Permission
            $table->boolean('create_video')->default(false);
            $table->boolean('view_video')->default(false);
            $table->boolean('update_video')->default(false);
            $table->boolean('delete_video')->default(false);

            // Other permission
            $table->boolean('access_copyright')->default(false);
            $table->boolean('view_settings')->default(false);
            $table->boolean('assign_task')->default(false);
            $table->boolean('access_finance')->default(false);
            
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
