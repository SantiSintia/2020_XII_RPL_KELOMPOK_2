<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restores', function (Blueprint $table) {
            $table->bigIncrements('rst_id');
            $table->unsignedBigInteger('rst_usr_id');
            $table->unsignedBigInteger('rst_ass_id');
            $table->unsignedBigInteger('rst_brs_id');
            $table->unsignedBigInteger('rst_brw_id');
            $table->unsignedBigInteger('rst_bas_id');
            $table->date('rst_date')->nullable();
            $table->string('rst_condition')->nullable();
           
            $table->unsignedBigInteger('rst_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rst_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rst_deleted_by')->unsigned()->nullable();
            
            $table->foreign('rst_usr_id')->references('usr_id')->on('users')->onDelete('cascade'); 
            $table->foreign('rst_ass_id')->references('ass_id')->on('assets')->onDelete('cascade');
            $table->foreign('rst_brs_id')->references('brs_id')->on('borrows_statuses')->onDelete('cascade'); 
            $table->foreign('rst_brw_id')->references('brw_id')->on('borrows')->onDelete('cascade'); 
            $table->foreign('rst_bas_id')->references('bas_id')->on('borrow_assets')->onDelete('cascade');         
            
            $table->foreign('rst_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rst_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rst_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
             $table->softDeletes();
            $table->string('rst_sys_note')->nullable();


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
        Schema::dropIfExists('restore');
    }
}
