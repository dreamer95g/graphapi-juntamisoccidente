<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_image', function (Blueprint $table) {
            $table->unsignedBigInteger('curriculum_id');
            $table->unsignedBigInteger('image_id');

            //$table->foreign('curriculum_id')->references('id')->on('curricula')->onUpdate('cascade');
            //$table->foreign('image_id')->references('id')->on('images')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculum_image');
    }
}
