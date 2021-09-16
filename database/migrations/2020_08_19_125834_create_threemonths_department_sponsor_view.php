<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateThreemonthsDepartmentSponsorView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS threemonths_department_sponsor_view");

        DB::statement(
            "CREATE VIEW threemonths_department_sponsor_view AS
            SELECT
payrolls.id,
payrolls.curriculum_id,
payrolls.`year`,
payrolls.`month`,
sundays.s1,
sundays.s2,
sundays.s3,
sundays.s4,
sundays.department_id,
sponsors.id as sponsor_id
FROM
payrolls
INNER JOIN payroll_sponsor ON payroll_sponsor.payroll_id = payrolls.id
INNER JOIN sponsors ON payroll_sponsor.sponsor_id = sponsors.id
INNER JOIN payroll_sunday ON payroll_sunday.payroll_id = payrolls.id
INNER JOIN sundays ON payroll_sunday.sunday_id = sundays.id
WHERE
	 ISNULL(payrolls.deleted_at)
	AND  ISNULL(sundays.deleted_at)
	AND  ISNULL(sponsors.deleted_at)
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
        Schema::dropIfExists('threemonths_department_sponsor_view');
    }
}
