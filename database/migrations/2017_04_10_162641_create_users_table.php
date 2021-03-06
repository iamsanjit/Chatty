<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{


        public function up()
        {
                Schema::create('users', function (Blueprint $table) {
                        
                        $table->increments('id');
                        $table->string('username');
                        $table->string('email');
                        $table->string('password');
                        $table->string('first_name')->nullable();
                        $table->string('last_name')->nullable();
                        $table->string('location')->nullable();
                        $table->string('remember_token')->nullable();
                        $table->timestamps();

                });
        }

        public function down()
        {
                Schema::drop('users');
        }               
}
