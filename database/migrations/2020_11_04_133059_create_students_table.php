<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('usr_id');
            $table->unsignedBigInteger('std_usr_id'); 
            $table->string('std_name');
            $table->string('std_nis')->unique();
            $table->string('std_class');

            $table->unsignedBigInteger('std_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('std_updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('std_deleted_by')->unsigned()->nullable();
            
            
            $table->foreign('std_usr_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('std_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('std_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('std_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->string('std_sys_note')->nullable();

            
            

            
          
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
