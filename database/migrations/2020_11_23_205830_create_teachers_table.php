<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('tc_id');
            $table->unsignedBigInteger('tc_usr_id');
            $table->string('tc_name');
            $table->string('tc_nip')->unique();

            $table->unsignedBigInteger('tc_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('tc_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('tc_deleted_by')->unsigned()->nullable();
            
            $table->foreign('tc_usr_id')->references('usr_id')->on('users')->onDelete('cascade'); 
            $table->foreign('tc_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tc_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tc_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->timestamps();

            $table->string('tc_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher');
    }
}
