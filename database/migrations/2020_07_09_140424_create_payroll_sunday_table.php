<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollSundayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_sunday', function (Blueprint $table) {
            $table->unsignedBigInteger('payroll_id');
            $table->unsignedBigInteger('sunday_id');

            //$table->foreign('payroll_id')->references('id')->on('payrolls')->onUpdate('cascade');
            //$table->foreign('sunday_id')->references('id')->on('sundays')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payroll_sunday');
    }
}
