<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateThreemonthsConceptsCurriculumView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("DROP VIEW IF EXISTS threemonths_concepts_curriculum_view");

        DB::statement(
            "CREATE VIEW threemonths_concepts_curriculum_view AS
            SELECT
payrolls.id,
payrolls.curriculum_id,
payrolls.`year`,
payrolls.`month`,
concepts.current_membership,
concepts.baptism_candidates,
concepts.new_believers_discipled,
concepts.ministered_lives
FROM
payrolls
INNER JOIN concepts
ON payrolls.concept_id = concepts.id
WHERE ISNULL(payrolls.deleted_at)
	AND ISNULL(concepts.deleted_at)
ORDER BY payrolls.id"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW threemonths_concepts_curriculum_view");
    }
}
