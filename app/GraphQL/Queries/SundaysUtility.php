<?php

namespace App\GraphQL\Queries;

class SundaysUtility
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // return \App\Book::where('author', 'like', '%' . $args['search'] . '%')->get();

        $input = $args['input'];
        $recipe = $input['grid'];

        if ($recipe != null) {
            $s1 = [];
            $s2 = [];
            $s3 = [];
            $s4 = [];
            $grid = [];

            for ($i = 0; $i < count($recipe) - 1; $i++) {

                // add items to temporal lists that will be counted
                $item = (object) $recipe[$i];

                array_push($s1, $item->s1);
                array_push($s2, $item->s2);
                array_push($s3, $item->s3);
                array_push($s4, $item->s4);

                $tempavg = ($item->s1 + $item->s2 + $item->s3 + $item->s4) / 4;
                $item->average = round($tempavg);

                array_push($grid, $item);
            }

            $sum_s1 = array_sum($s1);
            $sum_s2 = array_sum($s2);
            $sum_s3 = array_sum($s3);
            $sum_s4 = array_sum($s4);

            $total = (object) $recipe[count($recipe) - 1];

            $total->s1 = $sum_s1;
            $total->s2 = $sum_s2;
            $total->s3 = $sum_s3;
            $total->s4 = $sum_s4;
            $tempavgtot = ($sum_s1 + $sum_s2 + $sum_s3 + $sum_s4) / 4;
            $total->average = round($tempavgtot);
            array_push($grid, $total);

            return ($grid);
        }
    }
}
