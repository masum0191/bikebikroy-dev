<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikeshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikeshops', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedInteger('admin_id')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('shopname',350)->nullable();
            $table->string('address',850)->nullable();
            $table->string('shopemail',350)->nullable();
            $table->string('slug',350)->nullable();
            $table->string('contactnumber')->nullable();
            $table->string('profilephoto')->nullable();
            $table->string('coverphoto')->nullable();
            $table->string('facebookshoplink',350)->nullable();
            $table->string('googleamplocaltion',500)->nullable();
            $table->string('path')->nullable();
            $table->text('description')->nullable();
            $table->date('shopexpiredate')->nullable();
            $table->integer('view')->default(0);
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('bikeshops');
    }
}
