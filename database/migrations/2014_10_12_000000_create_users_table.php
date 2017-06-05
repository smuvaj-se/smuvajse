<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->text('about')->nullable();
            $table->string('avatar')->nullable();
            $table->string('street')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('country_id');
            $table->boolean('sex');
            $table->json('options')->nullable();
            $table->rememberToken();
            $table->dateTime('birthDate');
            $table->tinyInteger('role_id');
            $table->dateTime('created_at');
            $table->timestamp('updated_at')->default(DB::raw('now()'));
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
