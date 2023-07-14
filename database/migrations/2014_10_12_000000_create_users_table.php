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
            $table->bigIncrements('id');
            $table->string('name','10');
            $table->string('email','100')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password','100');
            $table->boolean('del_flg')->default(true);
            $table->integer('role')->default(1);
            $table->integer('telephone')->nullable();
            $table->integer('postcode')->nullable();
            $table->string('address','30')->nullable();
            $table->rememberToken();
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
