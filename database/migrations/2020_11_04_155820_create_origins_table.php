<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOriginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('origins', function (Blueprint $table) {
            $table->bigIncrements('ori_id');
            $table->string('ori_code');
            $table->string('ori_name');
            
            $table->unsignedBigInteger('ori_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ori_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ori_deleted_by')->unsigned()->nullable();  

            $table->foreign('ori_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ori_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ori_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');   

            $table->timestamps();
            $table->string('ori_sys_note')->nullable();
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
