<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positionTypes', function (Blueprint $table) {
            $table->bigIncrements('usr_id');
            $table->unsignedBigInteger('pst_usr_id');
            $table->foreign('pst_usr_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('pst_name');
            $table->unsignedBigInteger('pst_nip')->unique();
            $table->unsignedBigInteger('pst_position');
            $table->unsignedBigInteger('pst_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('pst_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('pst_deleted_by')->unsigned()->nullable();
            $table->foreign('pst_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('pst_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('pst_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->string('pst_sys_note')->nullable();
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
