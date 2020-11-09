<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_categories', function (Blueprint $table) {
            $table->bigIncrements('asc_id');
            $table->string('asc_code');
            $table->unsignedBigInteger('asc_original_code');
            $table->string('asc_name');
            $table->unsignedBigInteger('asc_parent_asset_categories_id');
            $table->unsignedBigInteger('asc_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('asc_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('asc_deleted_by')->unsigned()->nullable();

            $table->foreign('asc_parent_asset_categories_id')->references('usr_id')->on('users')->onDelete('cascade');           
            $table->foreign('asc_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('asc_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('asc_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->string('asc_sys_note')->nullable();
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
