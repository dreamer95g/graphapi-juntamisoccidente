<?php

namespace App\GraphQL\Mutations;

use App\Models\Payroll\Payroll;
use App\Models\Payroll\Sunday;

class DeletePayrolls
{
    /**
     * @param  null $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $ids = $args['ids'];
        $result = array();

        if (count($ids) !== 0) {

            foreach ($ids as $id) {
                $payroll = Payroll::find($id);

                if ($payroll !== null) {

                    //SPONSORS
                    $sponsors = $payroll->sponsors()->get();
                    if (count($sponsors) !== 0) {

                        foreach ($sponsors as $sp) {
                            $payroll->sponsors()->detach($sp->id);
                        }
                    }
                    //SUNDAYS
                    $sundays = $payroll->sundays()->get();

                    if (count($sundays) !== 0) {
                        foreach ($sundays as $sun) {
                            //DETACH
                            $payroll->sundays()->detach($sun->id);
                            //DELETE
                            $sun->delete();
                        }
                    }

                    //CONCEPT
                    $concept = $payroll->concept()->first();
                    if ($concept !== null) {
                        $concept->delete();
                    }

                    //ELIIMINAR LA PLANILLA
                    $payroll->delete();
                    array_push($result, $payroll);
                }
            }
        }

        return $result;
    }
}
