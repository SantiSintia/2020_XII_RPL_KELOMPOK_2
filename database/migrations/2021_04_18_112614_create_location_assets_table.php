<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_assets', function (Blueprint $table) {
            $table->bigIncrements('la_id');
            $table->unsignedBigInteger('la_asc_id');
            $table->unsignedBigInteger('la_ast_id');
            $table->unsignedBigInteger('la_ass_id');
            
            $table->unsignedBigInteger('la_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('la_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('la_deleted_by')->unsigned()->nullable();
            
            $table->foreign('la_asc_id')->references('asc_id')->on('asset_categories')->onDelete('cascade'); 
            $table->foreign('la_ast_id')->references('ast_id')->on('asset_types')->onDelete('cascade'); 
            $table->foreign('la_ass_id')->references('ass_id')->on('assets')->onDelete('cascade'); 
            
            $table->foreign('la_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('la_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('la_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');

            $table->string('la_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_assets');
    }
}
