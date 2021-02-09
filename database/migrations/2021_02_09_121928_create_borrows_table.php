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
            $table->unsignedBigInteger('brw_ass_id');
            $table->unsignedBigInteger('brw_amount');
            $table->date('brw_date');
            $table->string('brw_licensor');
            $table->boolean('brw_status');

            $table->unsignedBigInteger('brw_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('brw_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('brw_deleted_by')->unsigned()->nullable();
            
            $table->foreign('brw_usr_id')->references('usr_id')->on('users')->onDelete('cascade'); 
            $table->foreign('brw_ass_id')->references('ass_id')->on('assets')->onDelete('cascade');         
            
            $table->foreign('brw_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('brw_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('brw_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('borrows');
    }
}
