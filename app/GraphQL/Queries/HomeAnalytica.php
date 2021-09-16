<?php

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\DB;

class HomeAnalytica
{
  /**
   * @param  null  $_
   * @param  array<string, mixed>  $args
   */
  public function __invoke($_, array $args)
  {

    $month = date("m") - 1;
    if ($month == 0) {
      $month = 12;
    }
    //$month = "12";
    $year = date("Y");

    if ($month == 12) {
      $year -= 1;
    }

    //ASSISTANCE
    $current_members = $this->getCurrentMembership($year, $month);
    $men = $this->getMen($year, $month);
    $ladies = $this->getLadies($year, $month);
    $youngs = $this->getYoungs($year, $month);
    $teens = $this->getTeens($year, $month);
    $kids = $this->getKids($year, $month);

    $lastY = date('Y');
    $fourthY = $lastY - 1;
    $thirdYear = $lastY - 2;
    $secondlyY = $lastY - 3;
    $firstY = $lastY - 4;

    //STEP LINE GRAPHIC
    $firstYear = $this->getYearMembership($firstY);
    $secondlyYear = $this->getYearMembership($secondlyY);
    $thirdYear = $this->getYearMembership($thirdYear);
    $fourthYear = $this->getYearMembership($fourthY);
    $lastYear = $this->getYearMembership($lastY);


    //FAITH PROFESSIONS
    $faithProfession = $this->getFaithProfessions();
    $baptism = $this->getBaptism();



    $result = array(

      "members" => $current_members,
      "kids" => $kids,
      "teens" => $teens,
      "youngs" => $youngs,
      "men" => $men,
      "ladies" => $ladies,
      "first_year" => $firstYear,
      "secondly_year" => $secondlyYear,
      "third_year" => $thirdYear,
      "fourth_year" => $fourthYear,
      "last_year" => $lastYear,
      "faith_profession" => $faithProfession,
      "baptism" => $baptism

    );

    return $result;
  }

  function getCurrentMembership($year, $month)
  {
    $result = 0;

    $membersQuery =
      DB::table('threemonths_concepts_district_view')->select('current_membership')->where([
        ['year', $year],
        ['month', $month]
      ])->get();

    if (count($membersQuery) != 0) {
      foreach ($membersQuery as $item) {
        $result += $item->current_membership;
      }
    }

    return $result;
  }

  function getMen($year, $month)
  {
    $result = 0;

    $menQuery
      = DB::table('threemonths_department_district_view')->select('s1', 's2', 's3', 's4')->where([
        ['year', $year],
        ['month', $month],
        ['department_id', 1]
      ])->get();

    if (count($menQuery) != 0) {
      foreach ($menQuery as $item) {
        $avg = round(($item->s1 + $item->s2 + $item->s3 + $item->s4) / 4);
        $result += $avg;
      }
    }

    return $result;
  }

  function getLadies($year, $month)
  {
    $result = 0;

    $ladiesQuery
      = DB::table('threemonths_department_district_view')->select('s1', 's2', 's3', 's4')->where([
        ['year', $year],
        ['month', $month],
        ['department_id', 2]
      ])->get();

    if (count($ladiesQuery) != 0) {
      foreach ($ladiesQuery as $item) {
        $avg = round(($item->s1 + $item->s2 + $item->s3 + $item->s4) / 4);
        $result += $avg;
      }
    }

    return $result;
  }

  function getYoungs($year, $month)
  {
    $result = 0;
    $youthQuery
      = DB::table('threemonths_department_district_view')->select('s1', 's2', 's3', 's4')->where([
        ['year', $year],
        ['month', $month],
        ['department_id', 3]
      ])->get();

    if (count($youthQuery) != 0) {
      foreach ($youthQuery as $item) {
        $avg = round(($item->s1 + $item->s2 + $item->s3 + $item->s4) / 4);
        $result += $avg;
      }
    }

    return $result;
  }

  function getTeens($year, $month)
  {
    $result = 0;
    $teensQuery
      = DB::table('threemonths_department_district_view')->select('s1', 's2', 's3', 's4')->where([
        ['year', $year],
        ['month', $month],
        ['department_id', 4]
      ])->get();

    if (count($teensQuery) != 0) {
      foreach ($teensQuery as $item) {
        $avg = round(($item->s1 + $item->s2 + $item->s3 + $item->s4) / 4);
        $result += $avg;
      }
    }
    return $result;
  }

  function getKids($year, $month)
  {
    $result = 0;
    $kidsQuery
      = DB::table('threemonths_department_district_view')->select('s1', 's2', 's3', 's4')->where([
        ['year', $year],
        ['month', $month],
        ['department_id', 5]
      ])->get();

    if (count($kidsQuery) != 0) {

      foreach ($kidsQuery as $item) {
        $avg = round(($item->s1 + $item->s2 + $item->s3 + $item->s4) / 4);
        $result += $avg;
      }
    }
    return $result;
  }

  function getYearMembership($year)
  {


    $current_year = date("Y");

    $result = 0;

    if ($current_year == $year) {

      $month = date("m") - 1;
      if ($month == 0) {
        $month = 12;
      }
      //$month = "12";
      $year = date("Y");

      if ($month == 12) {
        $year -= 1;
      }

      $membersQuery =
        DB::table('threemonths_concepts_district_view')->select('current_membership')->where([
          ['year', $year],
          ['month', $month]
        ])->get();

      if (count($membersQuery) != 0) {
        foreach ($membersQuery as $item) {
          $result += $item->current_membership;
        }
      }
    } else {
      $membersQuery =
        DB::table('threemonths_concepts_district_view')->select('current_membership')->where([
          ['year', $year],
          ['month', 12]
        ])->get();

      if (count($membersQuery) != 0) {
        foreach ($membersQuery as $item) {
          $result += $item->current_membership;
        }
      }
    }

    return $result;
  }



  function getFaithProfessions()
  {
    $year = date("Y");

    $result = 0;

    $faithQuery =
      DB::table('threemonths_concepts_district_view')->select('faith_professions')->where([
        ['year', $year]
      ])->get();

    if (count($faithQuery) != 0) {
      foreach ($faithQuery as $item) {
        $result += $item->faith_professions;
      }
    }

    return $result;
  }

  function getBaptism()
  {
    $year = date("Y");

    $result = 0;

    $baptismQuery =
      DB::table('threemonths_concepts_district_view')->select('baptism')->where([
        ['year', $year]
      ])->get();

    if (count($baptismQuery) != 0) {
      foreach ($baptismQuery as $item) {
        $result += $item->baptism;
      }
    }

    return $result;
  }
}
