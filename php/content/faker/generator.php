<?php

require_once '../vendor/autoload.php';
require_once 'FakeData.php';

function generate_data()
{
    $data = array();
    $data2 = array();
    // use the factory to create a Faker\Generator instance
    $faker = Faker\Factory::create();
    // for include russian PersonName
    $faker->addProvider(new Faker\Provider\ru_RU\Person($faker));
    $faker->addProvider(new Faker\Provider\ru_RU\Company($faker));
    $faker->addProvider(new Faker\Provider\ru_RU\Color($faker));

    // generate 50 records
    for ($i = 0; $i < 50; $i++) {
        $data_row = new FakeData(
            $faker->name(),
            $faker->colorName(),
            $faker->date(),
            $faker->time(),
            $faker->monthName(),
            $faker->century(),
            $faker->countryCode(),
            $faker->randomDigit(),
            $faker->latitude(),
            $faker->longitude()
        );
        $data[] = $data_row;
        $data_row2 = new FakePeople(
            $faker->name(),
            $faker->phoneNumber(),
            $faker->company(),
            $faker->userAgent(),
            $faker->numberBetween(21, 35),
            $faker->dayOfWeek()
        );
        $data2[] = $data_row2;
    }

    $jsonData = json_encode($data);
    //for generated fixture data
    file_put_contents('results.json', $jsonData);
    $jsonData2 = json_encode($data2);
    //for generated fixture data
    file_put_contents('results2.json', $jsonData2);
}