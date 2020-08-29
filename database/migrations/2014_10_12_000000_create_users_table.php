<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->default('User');
            $table->string('email')->unique();
            $table->string('image')->default('default_resource/images/default_user_placeholder.png');
            $table->string('gender')->nullable();
            $table->string('contact')->nullable();
            $table->string('password');
            $table->string('status')->default('unverified');
            $table->timestamp('email_verified_at')->nullable();
            $table->longText('verification_token')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
