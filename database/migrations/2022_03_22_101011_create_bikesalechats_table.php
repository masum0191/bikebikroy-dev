<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikesalechatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikesalechats', function (Blueprint $table) {
             $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('bikesale_id')->nullable();
            $table->string('name')->nullable();
            $table->unsignedInteger('bikesaler_id')->nullable();
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
        Schema::dropIfExists('bikesalechats');
    }
}
