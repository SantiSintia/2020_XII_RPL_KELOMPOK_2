<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows_statuses', function (Blueprint $table) {
            $table->bigIncrements('brs_id');
            $table->unsignedBigInteger('brs_status');


            $table->unsignedBigInteger('brs_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('brs_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('brs_deleted_by')->unsigned()->nullable();

            $table->foreign('brs_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('brs_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('brs_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
             $table->softDeletes();
            $table->string('brs_sys_note')->nullable();


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
        Schema::dropIfExists('borrows_statuses');
    }
}
