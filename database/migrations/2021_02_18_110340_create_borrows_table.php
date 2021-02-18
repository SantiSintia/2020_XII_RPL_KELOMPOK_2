<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->bigIncrements('brw_id');
            $table->unsignedBigInteger('brw_usr_id');
            $table->unsignedBigInteger('brw_brs_id');

            $table->unsignedBigInteger('brw_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('brw_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('brw_deleted_by')->unsigned()->nullable();
            
            $table->foreign('brw_usr_id')->references('usr_id')->on('users')->onDelete('cascade');  
            $table->foreign('brw_brs_id')->references('brs_id')->on('borrows_statuses')->onDelete('cascade');         
            
            $table->foreign('brw_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('brw_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('brw_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');

            $table->string('brw_sys_note')->nullable();
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
        Schema::dropIfExists('borrows');
    }
}
