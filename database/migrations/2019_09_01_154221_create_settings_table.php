<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('APP_NAME')->nullable();
            $table->string('STORAGE_PATH')->nullable();
            $table->string('MAIL_USERNAME')->nullable();
            // $table->string('MAIL_PASSWORD')->nullable();
            $table->string('CAPTCHA_KEY',40)->nullable();
            $table->string('CAPTCHA_SECRET',40)->nullable();
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
        Schema::dropIfExists('settings');
    }
}
