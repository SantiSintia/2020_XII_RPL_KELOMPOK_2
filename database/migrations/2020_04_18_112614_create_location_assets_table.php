<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_assets', function (Blueprint $table) {
            $table->bigIncrements('la_id');
            $table->string('location_name');
            
            $table->unsignedBigInteger('parent_id')->nullable();
           
            
            $table->unsignedBigInteger('la_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('la_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('la_deleted_by')->unsigned()->nullable();
            
           
            $table->foreign('parent_id')->references('la_id')->on('location_assets')->onDelete('cascade'); 
           
            
            $table->foreign('la_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('la_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('la_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->string('la_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_assets');
    }
}
