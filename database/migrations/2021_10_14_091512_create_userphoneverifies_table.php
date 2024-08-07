<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserphoneverifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userphoneverifies', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->string('phonenumber')->nullable();
           $table->string('otp')->nullable();
           $table->date('expiredate')->nullable();
           $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('userphoneverifies');
    }
}
