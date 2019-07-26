<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_info', function (Blueprint $table) {
            $table->bigIncrements('c_id');
            $table->string('c_firstname');
            $table->string('c_lastname');
            $table->string('c_businesstname');
            $table->string('c_email');
            $table->string('c_password');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_company_info');
    }
}
