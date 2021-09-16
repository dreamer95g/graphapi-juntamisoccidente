<?php

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\DB;

class ThreeMonthsChurch
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $fail = "";
        //ENTRADA: ID DEL CURRICULUM
        //SALIDA: LAS VARIABLES QUE SE PIDEN

        //OBTENER LOS PARAMETROS DE LA CONSULTA
        $church_id = $args['church_id'];
        $three_selected = $args['three_selected'];
        $year = $args['year'];

        //1 DEFINIR EL ANHO ACTUAL, MES Y TRES MESES ANTERIORES
        $year = $year;
        $actual_month = date("m");

        switch ($three_selected) {
            case "Enero-Marzo":
                $actual_month = 3;
                break;

            case "Abril-Junio":
                $actual_month = 6;
                break;

            case "Julio-Septiembre":
                $actual_month = 9;
                break;

            case "Octubre-Diciembre":
                $actual_month = 12;
                break;
        }

        $before_month_1 = 0;
        $before_month_2 = 0;

        switch ($actual_month) {
            case 1:
                $before_month_1 = 12;
                $before_month_2 = 11;

                break;
            case 2:
                $before_month_1 = 1;
                $before_month_2 = 12;
                break;

            default:
                $before_month_1 = $actual_month - 1;
                $before_month_2 = $actual_month - 2;
                break;
        }

        //----------------------------VIDAS MINISTRADAS TRIMESTRE-----------------------------------------//

        //DECLARACION GLOBAL DE VARIABLES DE VIDAS MINISTRADAS
        $vidas_ministradas_mes = 0;
        $vidas_ministradas_before_1 = 0;
        $vidas_ministradas_before_2 = 0;

        //PARA VALIDAR LA SUMA DE LOS TRES MESES DE LAS VIDAS MINISTRADAS
        if ($actual_month != 1 && $actual_month != 2) {

            //VIDAS MINISTRADAS  , SUMA DE LOS TRES MESES
            $ministred_actual_query =
                DB::table('threemonths_concepts_church_view')->select('ministered_lives')->where([
                    ['year', $year],
                    ['month', $actual_month],
                    ['church_id', $church_id]
                ])->get();

            if (count($ministred_actual_query) != 0) {
                foreach ($ministred_actual_query as $item) {
                    $vidas_ministradas_mes += $item->ministered_lives;
                }
            } else {
                $fail = "Some form is missing";
            }

            //VIDAS MINISTRADAS MES ANTERIOR 1
            $ministred_before_1 =
                DB::table('threemonths_concepts_church_view')->select('ministered_lives')->where([
                    ['year', $year],
                    ['month', $before_month_1],
                    ['church_id', $church_id]
                ])->get();

            if (count($ministred_before_1) != 0) {

                foreach ($ministred_before_1 as $item) {
                    $vidas_ministradas_before_1 += $item->ministered_lives;
                }
            } else {
                $fail = "Some form is missing";
            }

            //VIDAS MINISTRADAS MES ANTERIOS 2
            $ministred_before_2 =
                DB::table('threemonths_concepts_church_view')->select('ministered_lives')->where([
                    ['year', $year],
                    ['month', $before_month_2],
                    ['church_id', $church_id]
                ])->get();

            if (count($ministred_before_2) != 0) {
                foreach ($ministred_before_2 as $item) {
                    $vidas_ministradas_before_2 += $item->ministered_lives;
                }
            } else {
                $fail = "Some form is missing";
            }

            if ($fail == "") {
                //VIDAS MINISTRADAS EN EL TRIMESTRE
                $vidas_ministradas_sum = $vidas_ministradas_mes +  $vidas_ministradas_before_1 + $vidas_ministradas_before_2;
            }
        } else if ($actual_month == 1) {
            //VIDAS MINISTRADAS  , SUMA DE LOS TRES MESES
            $ministred_actual_query =
                DB::table('threemonths_concepts_church_view')->select('ministered_lives')->where([
                    ['year', $year],
                    ['month', $actual_month],
                    ['church_id', $church_id]
                ])->get();

            if (count($ministred_actual_query) != 0) {
                foreach ($ministred_actual_query as $item) {
                    $vidas_ministradas_mes += $item->ministered_lives;
                }
            } else {
                $fail = "Some form is missing";
            }


            //VIDAS MINISTRADAS MES ANTERIOR 1
            $ministred_before_1 =
                DB::table('threemonths_concepts_church_view')->select('ministered_lives')->where([
                    ['year', $year - 1],
                    ['month', $before_month_1],
                    ['church_id', $church_id]
                ])->get();

            if (count($ministred_before_1) != 0) {
                foreach ($ministred_before_1 as $item) {
                    $vidas_ministradas_before_1 += $item->ministered_lives;
                }
            } else {
                $fail = "Some form is missing";
            }


            //VIDAS MINISTRADAS MES ANTERIOS 2
            $ministred_before_2 =
                DB::table('threemonths_concepts_church_view')->select('ministered_lives')->where([
                    ['year', $year - 1],
                    ['month', $before_month_2],
                    ['church_id', $church_id]
                ])->get();

            if (count($ministred_before_2) != 0) {
                foreach ($ministred_before_2 as $item) {
                    $vidas_ministradas_before_2 += $item->ministered_lives;
                }
            } else {
                $fail = "Some form is missing";
            }

            if ($fail == "") {
                //VIDAS MINISTRADAS EN EL TRIMESTRE
                $vidas_ministradas_sum = $vidas_ministradas_mes +  $vidas_ministradas_before_1 + $vidas_ministradas_before_2;
            }
        } else if ($actual_month == 2) {
            //VIDAS MINISTRADAS  , SUMA DE LOS TRES MESES
            $ministred_actual_query =
                DB::table('threemonths_concepts_church_view')->select('ministered_lives')->where([
                    ['year', $year],
                    ['month', $actual_month],
                    ['church_id', $church_id]
                ])->get();

            if (count($ministred_actual_query) != 0) {
                foreach ($ministred_actual_query as $item) {
                    $vidas_ministradas_mes += $item->ministered_lives;
                }
            } else {
                $fail = "Some form is missing";
            }


            //VIDAS MINISTRADAS MES ANTERIOR 1
            $ministred_before_1 =
                DB::table('threemonths_concepts_church_view')->select('ministered_lives')->where([
                    ['year', $year],
                    ['month', $before_month_1],
                    ['church_id', $church_id]
                ])->get();

            if (count($ministred_before_1) != 0) {
                foreach ($ministred_before_1 as $item) {
                    $vidas_ministradas_before_1 += $item->ministered_lives;
                }
            } else {
                $fail = "Some form is missing";
            }



            //VIDAS MINISTRADAS MES ANTERIOS 2
            $ministred_before_2 =
                DB::table('threemonths_concepts_church_view')->select('ministered_lives')->where([
                    ['year', $year - 1],
                    ['month', $before_month_2],
                    ['church_id', $church_id]
                ])->get();

            if (count($ministred_before_2) != 0) {
                foreach ($ministred_before_2 as $item) {
                    $vidas_ministradas_before_2 += $item->ministered_lives;
                }
            } else {
                $fail = "Some form is missing";
            }

            if ($fail == "") {
                //VIDAS MINISTRADAS EN EL TRIMESTRE
                $vidas_ministradas_sum = $vidas_ministradas_mes +  $vidas_ministradas_before_1 + $vidas_ministradas_before_2;
            }
        }

        //------------------------------CONCEPTOS DEL MES ACTUAL-------------------------------------------//

        //DECLARACION GLOBAL DE LAS VARIABLES
        $candidates = 0;
        $new_believers = 0;
        $membership = 0;


        //MEMBRESIA ACTUAL
        $members_query = DB::table('threemonths_concepts_church_view')->select('current_membership')->where([
            ['year', $year],
            ['month', $actual_month],
            ['church_id', $church_id]
        ])->get();

        if (count($members_query) != 0) {
            foreach ($members_query as $item) {
                $membership += $item->current_membership;
            }
        } else {
            $fail = "Some form is missing";
        }


        //DICIPULADO
        $candidates_query =
            DB::table('threemonths_concepts_church_view')->select('baptism_candidates')->where([
                ['year', $year],
                ['month', $actual_month],
                ['church_id', $church_id]
            ])->get();

        if (count($candidates_query) != 0) {
            foreach ($candidates_query as $item) {
                $candidates += $item->baptism_candidates;
            }
        } else {
            $fail = "Some form is missing";
        }

        //NUEVOS CREYENTES
        $news_query =
            DB::table('threemonths_concepts_church_view')->select('new_believers_discipled')->where([
                ['year', $year],
                ['month', $actual_month],
                ['church_id', $church_id]
            ])->get();

        if (count($news_query) != 0) {
            foreach ($news_query as $item) {
                $new_believers += $item->new_believers_discipled;
            }
        } else {
            $fail = "Some form is missing";
        }

        //----------------------------------------DEPARTAMENTOS--------------------------------------------//
        //DECLARACION DE LAS VARIABLES
        $kids = 0;
        $youth = 0;
        $teens = 0;
        $men = 0;
        $ladies = 0;


        //NINHOS, PROMEDIO DE LAS CUATRO SEMANAS
        $kids_query
            = DB::table('threemonths_department_church_view')->select('s1', 's2', 's3', 's4')->where([
                ['year', $year],
                ['month', $actual_month],
                ['church_id', $church_id],
                ['department_id', 5]
            ])->get();

        if (count($kids_query) != 0) {

            foreach ($kids_query as $item) {
                $avg = round(($item->s1 + $item->s2 + $item->s3 + $item->s4) / 4);
                $kids += $avg;
            }
        } else {
            $fail = "Some form is missing";
        }


        //JOVENES, PROMEDIO DE LAS CUATRO SEMANAS
        $youth_query
            = DB::table('threemonths_department_church_view')->select('s1', 's2', 's3', 's4')->where([
                ['year', $year],
                ['month', $actual_month],
                ['church_id', $church_id],
                ['department_id', 3]
            ])->get();

        if (count($youth_query) != 0) {
            foreach ($youth_query as $item) {
                $avg = round(($item->s1 + $item->s2 + $item->s3 + $item->s4) / 4);
                $youth += $avg;
            }
        } else {
            $fail = "Some form is missing";
        }



        //ADOLESCENTES, PROMEDIO DE LAS CUATRO SEMANAS
        $teens_query
            = DB::table('threemonths_department_church_view')->select('s1', 's2', 's3', 's4')->where([
                ['year', $year],
                ['month', $actual_month],
                ['church_id', $church_id],
                ['department_id', 4]
            ])->get();

        if (count($teens_query) != 0) {
            foreach ($teens_query as $item) {
                $avg = round(($item->s1 + $item->s2 + $item->s3 + $item->s4) / 4);
                $teens += $avg;
            }
        } else {
            $fail = "Some form is missing";
        }



        // //HOMBRES, PROMEDIO DE LAS CUATRO SEMANAS
        $men_query
            = DB::table('threemonths_department_church_view')->select('s1', 's2', 's3', 's4')->where([
                ['year', $year],
                ['month', $actual_month],
                ['church_id', $church_id],
                ['department_id', 1]
            ])->get();

        if (count($men_query) != 0) {
            foreach ($men_query as $item) {
                $avg = round(($item->s1 + $item->s2 + $item->s3 + $item->s4) / 4);
                $men += $avg;
            }
        } else {
            $fail = "Some form is missing";
        }

        //DAMAS, PROMEDIO DE LAS CUATRO SEMANAS
        $ladies_query
            = DB::table('threemonths_department_church_view')->select('s1', 's2', 's3', 's4')->where([
                ['year', $year],
                ['month', $actual_month],
                ['church_id', $church_id],
                ['department_id', 2]
            ])->get();

        if (count($ladies_query) != 0) {
            foreach ($ladies_query as $item) {
                $avg = round(($item->s1 + $item->s2 + $item->s3 + $item->s4) / 4);
                $ladies += $avg;
            }
        } else {
            $fail = "Some form is missing";
        }



        //COMPORBAR QUE NO FALTE NINGUNA PLANILLA
        if ($fail == "") {
            $baptist_family = $membership + $candidates + $teens + $kids + $new_believers;

            $result = array(
                "year" => $year,
                "month" => $actual_month,
                "members" => $membership,
                "discipleship" => $candidates,
                "kids" => $kids,
                "teens" => $teens,
                "youngs" => $youth,
                "men" => $men,
                "ladies" => $ladies,
                "baptist_family" => $baptist_family,
                "ministered_lives" => $vidas_ministradas_sum
            );

            return $result;
        } else {
            return array("error" => $fail);
        }

        // echo "ministradas " . $vidas_ministradas_sum . "\n";
        // echo "dicipulado " . $candidates . "\n";
        // echo "nuevos " . $new_believers . "\n";
        // echo "miembros " . $membership . "\n";
    }
}
