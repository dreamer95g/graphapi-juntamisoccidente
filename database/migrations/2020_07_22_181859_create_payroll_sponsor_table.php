<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollSponsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_sponsor', function (Blueprint $table) {
            $table->unsignedBigInteger('payroll_id');
            $table->unsignedBigInteger('sponsor_id');

            //$table->foreign('payroll_id')->references('id')->on('payrolls')->onUpdate('cascade');
            //$table->foreign('sponsor_id')->references('id')->on('sponsors')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payroll_sponsor');
    }
}
