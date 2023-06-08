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
            $table->string('user_name');
            $table->string('user_email')->unique()->index();
            $table->string('user_phone')->unique()->index();
            $table->string('password');
            $table->integer('fail_number')->nullable();
            $table->dateTime('can_not_login_until')->nullable();
            $table->boolean('is_blocked')->nullable();
            $table->boolean('login_count')->nullable();
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
