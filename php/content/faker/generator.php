<?php

require_once '../vendor/autoload.php';
require_once 'FakeData.php';

function generate_data()
{
    $data2 = array();
    // use the factory to create a Faker\Generator instance
    $faker = Faker\Factory::create();
    // for include russian PersonName
    $faker->addProvider(new Faker\Provider\ru_RU\Person($faker));
    $faker->addProvider(new Faker\Provider\ru_RU\Company($faker));
#    $faker->addProvider(new Faker\Provider\ru_RU\Color($faker));

    // generate 50 records
    for ($i = 0; $i < 50; $i++) {
        $data_row2 = new FakePeople(
            $faker->name(),
            $faker->phoneNumber(),
            $faker->company(),
            $faker->userAgent(),
            $faker->numberBetween(21, 35),
            $faker->dayOfWeek(),
            $faker->randomDigit()
        );
        $data2[] = $data_row2;
    }

    $jsonData2 = json_encode($data2);
    //for generated fixture data
    file_put_contents('results.json', $jsonData2);
}