<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepts', function (Blueprint $table) {
            $table->id();

            $table->integer('current_membership');
            $table->integer('congregants_count');
            $table->integer('cells_count');
            $table->integer('missions_count');
            $table->integer('baptism_candidates');
            $table->integer('baptism');
            $table->integer('new_believers_discipled');
            $table->integer('trained_leaders');
            $table->integer('founded_cells');
            $table->integer('founded_missions');
            $table->integer('founded_churches');

            $table->integer('evangelistic_visits');
            $table->integer('discipleship_visits');
            $table->integer('building_visits');

            $table->integer('faith_professions');
            $table->integer('reconciled_brothers');
            $table->integer('ministered_lives');
            $table->integer('cults_held');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concepts');
    }
}
