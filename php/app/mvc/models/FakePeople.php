<?php

namespace mvc\models;
use mvc\core\Model;

class FakePeople
{
    public string $name;
    public string $phone_number;
    public string $company;
    public string $user_agent;
    public string $age;
    public string $day_of_week;
    public string $number;

    public function __construct(string $name,
                                string $phone_number,
                                string $company,
                                string $user_agent,
                                string $age,
                                string $day_of_week,
                                string $number
    )
    {
        $this->name = $name;
        $this->phone_number = $phone_number;
        $this->company = $company;
        $this->user_agent = $user_agent;
        $this->age = $age;
        $this->day_of_week = $day_of_week;
        $this->number = $number;
    }


}