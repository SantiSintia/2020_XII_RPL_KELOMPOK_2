<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replacements', function (Blueprint $table) {
            $table->bigIncrements('r_id');
            $table->unsignedBigInteger('r_usr_id');
            $table->unsignedBigInteger('r_bas_id');
            $table->unsignedBigInteger('r_ra_id');
            $table->timestamps();
            $table->unsignedBigInteger('r_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('r_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('r_deleted_by')->unsigned()->nullable();
            
            $table->foreign('r_usr_id')->references('usr_id')->on('users')->onDelete('cascade'); 
            $table->foreign('r_bas_id')->references('bas_id')->on('borrow_assets')->onDelete('cascade'); 
            $table->foreign('r_ra_id')->references('ra_id')->on('replacement_assets')->onDelete('cascade'); 
            
            $table->foreign('r_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('r_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('r_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');

            $table->string('r_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replacements');
    }
}
