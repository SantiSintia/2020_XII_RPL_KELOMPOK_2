<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_descriptions', function (Blueprint $table) {
            $table->bigIncrements('asd_id');
            $table->unsignedBigInteger('asd_ass_id');
            $table->string('asd_inggridient')->nullable();
            $table->string('asd_building_area')->nullable();
            $table->string('asd_merk')->nullable();
            $table->string('asd_spesification')->nullable();
            $table->string('asd_voltage')->nullable();
            $table->string('asd_condition');
                        
            $table->unsignedBigInteger('asd_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('asd_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('asd_deleted_by')->unsigned()->nullable(); 

            $table->foreign('asd_ass_id')->references('ass_id')->on('assets')->onDelete('cascade');     
            $table->foreign('asd_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('asd_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('asd_deleted_by')->references('usr_id')->on('users')->onDelete('cascade'); 

            $table->timestamps();
            $table->string('asd_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_descriptions');
    }
}
