<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatlists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('chatuser_id')->unsigned()->nullable();
            $table->foreign('chatuser_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('message')->nullable();
            $table->string('imagename')->nullable();	
			$table->boolean('read')->default(0);
			$table->boolean('deleted')->default(0);
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
        Schema::dropIfExists('chatlists');
    }
}
