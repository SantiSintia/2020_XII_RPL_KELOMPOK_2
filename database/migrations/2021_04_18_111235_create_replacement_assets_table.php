<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplacementAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replacement_assets', function (Blueprint $table) {
            $table->bigIncrements('ra_id');
            $table->unsignedBigInteger('ra_asd_id');
            $table->boolean('ra_status');
            
            $table->unsignedBigInteger('ra_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ra_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ra_deleted_by')->unsigned()->nullable();
            
            $table->foreign('ra_asd_id')->references('asd_id')->on('asset_descriptions')->onDelete('cascade'); 
            
            $table->foreign('ra_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ra_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ra_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');

            $table->string('ra_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replacement_assets');
    }
}
