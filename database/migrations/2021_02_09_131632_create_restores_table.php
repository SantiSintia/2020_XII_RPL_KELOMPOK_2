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
            $table->unsignedBigInteger('rst_brw_id');
            $table->date('rst_date');
            $table->string('rst_condition');
           
            $table->unsignedBigInteger('rst_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rst_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rst_deleted_by')->unsigned()->nullable();
            
            $table->foreign('rst_usr_id')->references('usr_id')->on('users')->onDelete('cascade'); 
            $table->foreign('rst_ass_id')->references('ass_id')->on('assets')->onDelete('cascade');
            $table->foreign('rst_brw_id')->references('brw_id')->on('borrows')->onDelete('cascade');         
            
            $table->foreign('rst_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rst_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rst_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');

            $table->string('asd_sys_note')->nullable();


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
