<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateThreemonthsDepartmentsCurriculumView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS threemonths_departments_curriculum_view");

        DB::statement(
            "CREATE VIEW threemonths_departments_curriculum_view AS
            SELECT
payrolls.id,
payrolls.curriculum_id,
payrolls.`year`,
payrolls.`month`,
sundays.s1,
sundays.s2,
sundays.s3,
sundays.s4,
sundays.department_id
FROM
payrolls
INNER JOIN payroll_sunday ON payroll_sunday.payroll_id = payrolls.id
INNER JOIN sundays ON payroll_sunday.sunday_id = sundays.id
WHERE
	ISNULL(payrolls.deleted_at)
	AND ISNULL(sundays.deleted_at)
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
        Schema::dropIfExists('threemonths_departments_curriculum_view');
    }
}
