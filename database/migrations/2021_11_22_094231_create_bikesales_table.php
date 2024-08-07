<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikesalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikesales', function (Blueprint $table) {
            $table->id('id');
           $table->string('title',350);
           $table->string('slug',300);
        $table->bigInteger('user_id')->unsigned()->nullable();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->unsignedInteger('admin_id')->nullable();
           $table->decimal('price',8,2);
           $table->boolean('negotiable')->default(true);
           $table->boolean('slider')->default(false);
           $table->boolean('topadd')->default(false);
           $table->boolean('urgentsale')->default(false);
           $table->enum('biketype', ['Motorcycle', 'Scooters','E-bikes', 'Other'])->nullable();
           $table->unsignedInteger('bikebrand_id')->nullable();
           $table->unsignedInteger('bikemodel_id')->nullable();
           $table->unsignedInteger('admin_id')->nullable();
           $table->unsignedInteger('manager_id')->nullable();
           $table->unsignedInteger('division_id')->nullable();
           $table->unsignedInteger('district_id')->nullable();
           $table->unsignedInteger('thana_id')->nullable();
           $table->unsignedInteger('area_id')->nullable();
          $table->string('condition')->nullable();
           $table->string('edition')->nullable();
           $table->integer('year')->nullable();
           $table->string('kilometerrun')->nullable();
           $table->string('manufacture')->nullable();
            $table->string('cc')->nullable();
           $table->string('description',1000)->nullable();
           $table->string('path')->nullable();
           $table->string('photoone')->nullable();
           $table->string('phototwo')->nullable();
           $table->string('photothree')->nullable();
           $table->string('photofour')->nullable();
           $table->string('photofive')->nullable();
           $table->string('admintype')->nullable();
           $table->json('phonenumber',200)->nullable();
           $table->date('expiredate')->nullable();
           $table->date('topaddexpire')->nullable();
           $table->date('bumpaddexpire')->nullable();
           $table->date('urgentexpire')->nullable();
           $table->date('spotlightexpire')->nullable();
           $table->integer('view')->default(0);
           $table->string('admincomment',500)->nullable();
           $table->boolean('adminsatus')->default(false);
          $table->string('managercomment',500)->nullable();
           $table->boolean('managersatus')->default(false);
           $table->string('metadescription',198)->nullable();
           $table->string('screma',3000)->nullable();
           $table->string('keyword',300)->nullable();
          $table->enum('status', ['Active', 'Rejecte','Pending-Approve','Expired','Pending'])->nullable();
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
        Schema::dropIfExists('bikesales');
    }
}
