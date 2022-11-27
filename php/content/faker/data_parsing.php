<?php

//  decode from json
function get_raw_data(): array {
    $input = file_get_contents('results.json');
    # echo print_r(json_decode($input));
    return json_decode($input);
}

function get_week_days_count($data): array
{
    $week_days_count = array();
    foreach ($data as $row) {
        $week_day = $row->day_of_week;
        if(!isset($week_days_count[$week_day])) {
            $week_days_count[$week_day] = 0;
        }
        $week_days_count[$week_day] += 1;
    }
    return $week_days_count;
}

function get_ages_count($data): array
{
    $ages_count = array();
    foreach ($data as $row) {
        $age = $row->age;
        if(!isset($ages_count[$age])) {
            $ages_count[$age] = 0;
        }
        $ages_count[$age] += 1;
    }
    return $ages_count;
}

function get_labels_and_values($func) {
    $raw_data = get_raw_data();

    //use given func to array
    $count = $func($raw_data);


    $labels = array_keys($count);
    $values = array_values($count);
    return array("labels" => $labels, "values" => $values);
}

function get_only_data($data, $param){
    $answer = array();
    foreach ($data as $row) {
        $century = $row->$param;
        array_push($answer, $century);
    }
    return $answer;
}