<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForgotpasswordUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forgot_users', function (Blueprint $table) {
            $table->id();
            $table->string('token_fogot');
            $table->string('email')->unique();
            $table->dateTime('due');
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
        Schema::dropIfExists('forgot_users');
    }
}
