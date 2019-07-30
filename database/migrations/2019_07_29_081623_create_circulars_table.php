<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCircularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circulars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('c_id')->unsigned;
            $table->string('job_title');
            $table->string('job_vacancy');
            $table->string('job_description');
            $table->string('educational_info');
            $table->string('job_experience');
            $table->string('job_salary');
            $table->string('job_location');
            $table->string('job_country');
            $table->string('deadline');
            $table->integer('visibility')->unsigned;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circulars');
    }
}
