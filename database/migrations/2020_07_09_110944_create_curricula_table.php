<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curricula', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('name');
            $table->boolean('sex');
            $table->text('profession');
            $table->string('nationality');
            $table->string('graduation_place');
            $table->text('adress');
            $table->text('academic_formation');
            $table->text('work_experience');
            $table->text('vision_goals');
            $table->text('conv_experience');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('language_id');

            $table->timestamps();
            $table->softDeletes();

            //$table->foreign('level_id')->references('id')->on('levels')->onUpdate('cascade');
            //$table->foreign('language_id')->references('id')->on('languages')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curricula');
    }
}
