<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_types', function (Blueprint $table) {
            $table->bigIncrements('ast_id');
            $table->unsignedBigInteger('ast_asset_categories_id');
            $table->string('ast_code');
            $table->unsignedBigInteger('ast_original_code');
            $table->string('ast_name');

            $table->unsignedBigInteger('ast_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ast_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ast_deleted_by')->unsigned()->nullable();  

            $table->foreign('ast_asset_categories_id')->references('asc_id')->on('asset_categories')->onDelete('cascade');        
            $table->foreign('ast_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ast_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ast_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->string('ast_sys_note')->nullable();
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
