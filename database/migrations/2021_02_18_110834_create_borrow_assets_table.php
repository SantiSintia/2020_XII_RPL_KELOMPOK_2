<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_assets', function (Blueprint $table) {
            $table->bigIncrements('bas_id');
            $table->unsignedBigInteger('bas_ass_id');
            $table->unsignedBigInteger('bas_brw_id');
            $table->boolean('bas_status');

            $table->unsignedBigInteger('bas_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('bas_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('bas_deleted_by')->unsigned()->nullable();
             
            $table->foreign('bas_ass_id')->references('ass_id')->on('assets')->onDelete('cascade'); 
            $table->foreign('bas_brw_id')->references('brw_id')->on('borrows')->onDelete('cascade');         
            
            $table->foreign('bas_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('bas_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('bas_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');

            $table->string('bas_sys_note')->nullable();
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
        Schema::dropIfExists('borrow_assets');
    }
}
