<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('ass_id');
            $table->unsignedBigInteger('ass_asset_category_id');
            $table->unsignedBigInteger('ass_asset_type_id');
            $table->unsignedBigInteger('ass_origin_id');
            $table->string('ass_year');
            $table->string('ass_registration_code')->unique();
            $table->string('ass_name');
            $table->string('ass_price')->nullable();

            $table->unsignedBigInteger('ass_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ass_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ass_deleted_by')->unsigned()->nullable();  

            $table->foreign('ass_asset_category_id')->references('asc_id')->on('asset_categories')->onDelete('cascade');
            $table->foreign('ass_asset_type_id')->references('ast_id')->on('asset_types')->onDelete('cascade');
            $table->foreign('ass_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ass_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ass_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');   

            $table->timestamps();
            $table->string('ass_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
