<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikesalechatdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikesalechatdetails', function (Blueprint $table) {
             $table->id();
            $table->unsignedInteger('bikesalechat_id')->nullable();
            $table->unsignedInteger('bikesaler_id')->nullable();
            $table->string('message',500)->nullable();
            $table->string('replymessage',500)->nullable();
            $table->string('messageby')->nullable();
            $table->tinyInteger('bikesaleuserseen')->default(0);
            $table->tinyInteger('userseen')->default(0);
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
        Schema::dropIfExists('bikesalechatdetails');
    }
}
