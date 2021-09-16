<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->integer('year')->unsigned();
            $table->integer('month')->unsigned();
            $table->boolean('pastor');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('church_id');
            $table->unsignedBigInteger('mission_id');
            $table->unsignedBigInteger('concept_id');
            $table->unsignedBigInteger('curriculum_id');

            $table->timestamps();
            //borrado logico
            $table->softDeletes();

            //llaves foraneas
            //$table->foreign('district_id')->references('id')->on('districts')->onUpdate('cascade');
            //$table->foreign('curriculum_id')->references('id')->on('curricula')->onUpdate('cascade');
            //$table->foreign('church_id')->references('id')->on('churches')->onUpdate('cascade');
            //$table->foreign('concept_id')->references('id')->on('concepts')->onUpdate('cascade');
            //$table->foreign('mission_id')->references('id')->on('missions')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}
