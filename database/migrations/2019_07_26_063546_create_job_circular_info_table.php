<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCircularInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_circular_info', function (Blueprint $table) {
            $table->bigIncrements('cir_id');
            $table->integer('c_id');
            $table->string('job_title');
            $table->string('job_describtion');
            $table->string('job_salary');
            $table->string('job_location');
            $table->string('job_country');
            $table->string('deadline');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_circular_info');
    }
}
