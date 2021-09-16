<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateThreemonthsConceptsSponsorView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS threemonths_concepts_sponsor_view");

        DB::statement(
            "CREATE VIEW threemonths_concepts_sponsor_view AS
            SELECT
payrolls.id,
payrolls.curriculum_id,
payrolls.`year`,
payrolls.`month`,
concepts.current_membership,
concepts.baptism_candidates,
concepts.new_believers_discipled,
concepts.ministered_lives,
sponsors.id as sponsor_id
FROM
payrolls
INNER JOIN payroll_sponsor ON payroll_sponsor.payroll_id = payrolls.id
INNER JOIN sponsors ON payroll_sponsor.sponsor_id = sponsors.id
INNER JOIN concepts ON payrolls.concept_id = concepts.id
WHERE
	 ISNULL(payrolls.deleted_at)
	AND ISNULL(concepts.deleted_at)
    AND ISNULL(sponsors.deleted_at)

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
        Schema::dropIfExists('threemonths_concepts_sponsor_view');
    }
}
