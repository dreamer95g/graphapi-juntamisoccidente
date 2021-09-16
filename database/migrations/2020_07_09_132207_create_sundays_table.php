<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSundaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sundays', function (Blueprint $table) {
            $table->id();
            $table->integer('s1');
            $table->integer('s2');
            $table->integer('s3');
            $table->integer('s4');
            $table->unsignedBigInteger('department_id');
            $table->timestamps();
            $table->softDeletes();

            //$table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sundays');
    }
}
